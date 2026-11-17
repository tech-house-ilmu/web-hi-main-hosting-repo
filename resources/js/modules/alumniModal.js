/**
 * Alumni Stories Modal Module
 */
export function initAlumniModal() {
    if (document.getElementById('alumniModalOverlay')) return;

    const modalHTML = `
        <div class="alumni-modal-overlay" id="alumniModalOverlay">
            <div class="alumni-modal" role="dialog" aria-modal="true" aria-labelledby="alumniModalName">
                <button class="alumni-modal-close" id="alumniModalClose" type="button" aria-label="Tutup modal">&times;</button>
                <div class="alumni-modal-photo" id="alumniModalPhoto">
                    <img id="alumniModalImage" src="" alt="Foto alumni" style="display:none;">
                    <div class="alumni-photo-placeholder" id="alumniPhotoPlaceholder">FOTO ALUMNI</div>
                </div>
                <div class="alumni-modal-body">
                    <span class="alumni-modal-label">ALUMNI STORIES</span>
                    <h2 id="alumniModalName" style="color: #102d5c; font-size: 24px; font-weight: 800; margin: 12px 0 6px;"></h2>
                    <div class="alumni-modal-role" id="alumniModalRole" style="color: #8191a8; font-size: 14px; font-weight: 600; margin-bottom: 16px;"></div>
                    <div class="alumni-modal-divider" style="height: 1px; background: #e5e9ef; margin-bottom: 18px;"></div>
                    <div class="alumni-modal-story" id="alumniModalStory" style="color: #495d78; font-size: 15px; line-height: 1.85; margin-bottom: 24px;"></div>
                    <div class="alumni-modal-footer" style="font-size: 12px; font-weight: 800; color: #ff8517; letter-spacing: 1px;">HOUSE ILMU INDONESIA</div>
                </div>
            </div>
        </div>
    `;

    document.body.insertAdjacentHTML('beforeend', modalHTML);

    const overlay = document.getElementById('alumniModalOverlay');
    const modal = overlay.querySelector('.alumni-modal');
    const closeButton = document.getElementById('alumniModalClose');
    const nameEl = document.getElementById('alumniModalName');
    const roleEl = document.getElementById('alumniModalRole');
    const storyEl = document.getElementById('alumniModalStory');
    const modalImage = document.getElementById('alumniModalImage');
    const photoPlaceholder = document.getElementById('alumniPhotoPlaceholder');

    let previousFocus = null;

    function getAlumniData(card) {
        const alumniName = card.querySelector('h2') || card.querySelector('strong') || card.querySelector('.alumni-name');
        const alumniRole = card.querySelector('.story-role') || card.querySelector('.alumni-content > span:not(.quote-mark)') || card.querySelector('.alumni-role');
        const alumniStory = card.querySelector('.story-content p') || card.querySelector('.alumni-content p') || card.querySelector('.alumni-story');
        const alumniImage = card.querySelector('.story-image img') || card.querySelector('.alumni-image img') || card.querySelector('.alumni-photo img') || card.querySelector('img');

        const imagePath = card.dataset.photo || (alumniImage ? alumniImage.getAttribute('src') : '');

        return {
            name: alumniName ? alumniName.textContent.trim() : 'Alumni House Ilmu',
            role: alumniRole ? alumniRole.textContent.trim() : 'House Ilmu Indonesia',
            story: alumniStory ? alumniStory.textContent.trim() : 'Cerita alumni belum tersedia.',
            image: imagePath,
        };
    }

    function openModal(card, trigger) {
        const data = getAlumniData(card);

        nameEl.textContent = data.name;
        roleEl.textContent = data.role;
        storyEl.textContent = data.story;

        if (data.image && !data.image.includes('placeholder')) {
            modalImage.src = data.image;
            modalImage.alt = 'Foto ' + data.name;
            modalImage.style.display = 'block';
            photoPlaceholder.style.display = 'none';
        } else {
            modalImage.removeAttribute('src');
            modalImage.style.display = 'none';
            photoPlaceholder.style.display = 'flex';
        }

        previousFocus = trigger;
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
        closeButton.focus();
    }

    function closeModal() {
        overlay.classList.remove('show');
        document.body.style.overflow = '';
        if (previousFocus) {
            previousFocus.focus();
        }
    }

    document.addEventListener('click', function (event) {
        const trigger = event.target.closest('.open-alumni-modal, .story-content button, .alumni-content a, .alumni-content button');
        if (!trigger) return;

        const card = trigger.closest('.story-card, .alumni-card');
        if (!card) return;

        event.preventDefault();
        openModal(card, trigger);
    });

    closeButton.addEventListener('click', closeModal);
    overlay.addEventListener('click', function (event) {
        if (event.target === overlay) {
            closeModal();
        }
    });

    modal.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && overlay.classList.contains('show')) {
            closeModal();
        }
    });

    modalImage.addEventListener('error', function () {
        modalImage.style.display = 'none';
        photoPlaceholder.style.display = 'flex';
    });
}
