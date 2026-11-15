<section class="comments-section max-w-7xl mx-auto px-4 my-5 py-4">
    <div class="comments-container">
        <h2 class="mb-4 font-bold text-2xl" style="color: #1746a2;">Komentar</h2>

        @if(session('success'))
            <div class="mb-4 p-4 rounded" style="background-color: #ffdd95; color: #01153e; border: 1px solid #1746a2;">
                {{ session('success') }}
            </div>
        @endif

        <div class="comment-form-wrapper mb-5 p-4 rounded" style="background-color: #fff7e9; border: 1px solid #1746a2;">
            <form action="{{ route('comments.store') }}" method="POST" id="mainCommentForm">
                @csrf
                <input type="hidden" name="page_slug" value="{{ url()->current() }}">
                <input type="hidden" name="parent_id" id="parentId" value="">

                <div id="replyIndicator" class="mb-3 hidden items-center gap-2">
                    <span class="text-sm font-semibold" style="color: #01153e;">Membalas komentar</span>
                    <button type="button" class="text-sm text-blue-700 hover:underline cursor-pointer bg-transparent border-none" onclick="cancelReply()">Batal</button>
                </div>

                <div class="mb-3">
                    <label for="name" class="block mb-1 font-semibold text-sm" style="color: #01153e;">Nama</label>
                    <input type="text"
                           class="w-full px-3 py-2 bg-white border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           style="border-color: #1746a2;"
                           required>
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="block mb-1 font-semibold text-sm" style="color: #01153e;">Isi Komentar</label>
                    <textarea class="w-full px-3 py-2 bg-white border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror"
                              id="content"
                              name="content"
                              rows="4"
                              style="border-color: #1746a2;"
                              required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="captcha" class="block mb-1 font-semibold text-sm" style="color: #01153e;">Verifikasi</label>
                    <div class="captcha-display mb-2 flex items-center">
                        <img src="{{ route('captcha.image') }}" alt="Captcha" class="captcha-image rounded" style="cursor: pointer;" onclick="refreshCaptcha()" title="Klik untuk ganti kode">
                        <button type="button" class="px-3 py-1 text-sm rounded font-medium ms-2 cursor-pointer transition hover:opacity-90" style="background-color: #ff731d; color: white;" onclick="refreshCaptcha()">Ubah</button>
                    </div>
                    <input type="text"
                           class="w-full px-3 py-2 bg-white border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('captcha') border-red-500 @enderror"
                           id="captcha"
                           name="captcha"
                           placeholder="Masukkan kode di atas"
                           style="border-color: #1746a2;"
                           required>
                    @error('captcha')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="px-4 py-2 rounded font-semibold cursor-pointer transition hover:opacity-90 border-none" style="background-color: #ff731d; color: white;">Kirim Komentar</button>
            </form>
        </div>

        <div class="comments-list">
            @forelse($comments as $comment)
                <div class="comment-item mb-3 p-3 rounded" style="background-color: #ffffff; border-left: 4px solid #ff731d; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <div class="flex justify-between items-center mb-2">
                        <strong style="color: #1746a2;">{{ $comment->name }}</strong>
                        <small class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-2" style="color: #01153e;">{{ $comment->content }}</p>
                    <button type="button" class="text-sm font-medium hover:underline cursor-pointer p-0 border-none bg-transparent" style="color: #ff731d;" onclick="replyTo({{ $comment->id }}, '{{ $comment->name }}')">Balas</button>

                    @if($comment->replies->count() > 0)
                        <div class="replies mt-3 ms-4">
                            @foreach($comment->replies as $reply)
                                <div class="reply-item mb-2 p-3 rounded" style="background-color: #fff7e9; border-left: 3px solid #1746a2;">
                                    <div class="flex justify-between items-center mb-2">
                                        <strong style="color: #1746a2;">{{ $reply->name }}</strong>
                                        <small class="text-gray-500 text-xs">{{ $reply->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-0" style="color: #01153e;">{{ $reply->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">Belum ada komentar. Jadilah pertama yang berkomentar!</p>
            @endforelse
        </div>
    </div>
</section>

<script>
function refreshCaptcha() {
    document.querySelector('.captcha-image').src = '{{ route('captcha.image') }}?' + Date.now();
}

function replyTo(commentId, commentName) {
    document.getElementById('parentId').value = commentId;
    document.getElementById('replyIndicator').classList.remove('d-none');
    document.getElementById('content').focus();
    document.getElementById('content').scrollIntoView({ behavior: 'smooth' });
}

function cancelReply() {
    document.getElementById('parentId').value = '';
    document.getElementById('replyIndicator').classList.add('d-none');
}
</script>
