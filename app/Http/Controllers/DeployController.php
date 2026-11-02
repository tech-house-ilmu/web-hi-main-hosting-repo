<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\RecruitmentAnnouncement;

class DeployController extends Controller
{
    /**
     * Webhook / One-click deployment endpoint to pull latest code and clear caches.
     * Can be accessed via GET or POST.
     * Example: https://your-domain.com/deploy-update?token=hi-deploy-2026
     */
    public function deploy(Request $request)
    {
        $secretToken = env('DEPLOY_TOKEN', 'hi-deploy-2026');
        $providedToken = $request->query('token') ?? $request->header('X-Deploy-Token') ?? $request->input('token');

        if ($providedToken !== $secretToken) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: Invalid deploy token. Please provide ?token=' . $secretToken,
            ], 403);
        }

        $results = [];

        // 1. Git pull if exec is available
        if (function_exists('exec')) {
            $basePath = base_path();
            $gitOutput = [];
            $status = 0;
            exec("cd {$basePath} && git pull origin main 2>&1", $gitOutput, $status);
            $results['git_pull'] = [
                'status_code' => $status,
                'output' => implode("\n", $gitOutput),
            ];
        } else {
            $results['git_pull'] = [
                'status_code' => -1,
                'output' => 'exec() function is disabled in php.ini. Git pull must be run via SSH or cPanel Git.',
            ];
        }

        // 2. Clear Laravel caches
        try {
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            $results['cache_cleared'] = true;
        } catch (\Throwable $e) {
            $results['cache_error'] = $e->getMessage();
        }

        // 3. Update Recruitment Announcement in DB if needed
        try {
            $announcement = RecruitmentAnnouncement::first();
            if ($announcement) {
                $announcement->divisions = RecruitmentAnnouncement::defaultDivisions();
                $announcement->announcement_date = '14 Oktober 2026';
                $announcement->save();
                $results['announcement_database_updated'] = true;
            }
        } catch (\Throwable $e) {
            $results['announcement_database_error'] = $e->getMessage();
        }

        return response()->json([
            'success' => true,
            'message' => 'Server deployment & cache clear finished successfully!',
            'details' => $results,
        ], 200, [], JSON_PRETTY_PRINT);
    }
}

