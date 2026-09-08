<section class="comments-section container-xl my-5 py-4">
    <div class="comments-container">
        <h2 class="mb-4 fw-bold" style="color: #1746a2;">Komentar</h2>

        @if(session('success'))
            <div class="alert mb-4" style="background-color: #ffdd95; color: #01153e; border: 1px solid #1746a2;">
                {{ session('success') }}
            </div>
        @endif

        <div class="comment-form-wrapper mb-5 p-4 rounded" style="background-color: #fff7e9; border: 1px solid #1746a2;">
            <form action="{{ route('comments.store') }}" method="POST" id="mainCommentForm">
                @csrf
                <input type="hidden" name="page_slug" value="{{ url()->current() }}">
                <input type="hidden" name="parent_id" id="parentId" value="">

                <div id="replyIndicator" class="mb-3 d-none">
                    <span class="badge" style="color: #01153e;">Membalas komentar</span>
                    <button type="button" class="btn btn-sm btn-link text-decoration-none" onclick="cancelReply()">Batal</button>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold" style="color: #01153e;">Nama</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           style="border-color: #1746a2;"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold" style="color: #01153e;">Isi Komentar</label>
                    <textarea class="form-control @error('content') is-invalid @enderror"
                              id="content"
                              name="content"
                              rows="4"
                              style="border-color: #1746a2;"
                              required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="captcha" class="form-label fw-semibold" style="color: #01153e;">Verifikasi</label>
                    <div class="captcha-display mb-2">
                        <img src="{{ route('captcha.image') }}" alt="Captcha" class="captcha-image" style="border-radius: 6px; cursor: pointer;" onclick="refreshCaptcha()" title="Klik untuk ganti kode">
                        <button type="button" class="btn btn-sm ms-2" style="background-color: #ff731d; color: white;" onclick="refreshCaptcha()">Ubah</button>
                    </div>
                    <input type="text"
                           class="form-control @error('captcha') is-invalid @enderror"
                           id="captcha"
                           name="captcha"
                           placeholder="Masukkan kode di atas"
                           style="border-color: #1746a2;"
                           required>
                    @error('captcha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn fw-semibold" style="background-color: #ff731d; color: white; border: none;">Kirim Komentar</button>
            </form>
        </div>

        <div class="comments-list">
            @forelse($comments as $comment)
                <div class="comment-item mb-3 p-3 rounded" style="background-color: #ffffff; border-left: 4px solid #ff731d; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong style="color: #1746a2;">{{ $comment->name }}</strong>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-2" style="color: #01153e;">{{ $comment->content }}</p>
                    <button type="button" class="btn btn-sm p-0 text-decoration-none" style="color: #ff731d;" onclick="replyTo({{ $comment->id }}, '{{ $comment->name }}')">Balas</button>

                    @if($comment->replies->count() > 0)
                        <div class="replies mt-3 ms-4">
                            @foreach($comment->replies as $reply)
                                <div class="reply-item mb-2 p-3 rounded" style="background-color: #fff7e9; border-left: 3px solid #1746a2;">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <strong style="color: #1746a2;">{{ $reply->name }}</strong>
                                        <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-0" style="color: #01153e;">{{ $reply->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-muted">Belum ada komentar. Jadilah pertama yang berkomentar!</p>
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
