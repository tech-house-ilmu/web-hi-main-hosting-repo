/**
 * Career Page Interactivity: Filter, Recruitment Tabs, Alumni Carousel
 */
export function initCareerPage() {
    const careerPage = document.querySelector('.career-page');
    if (!careerPage) return;

    /* --------------------------------------
       1. Filter Divisi
    -------------------------------------- */
    const divisionFilter = document.getElementById('divisionFilter');
    const positionCards = document.querySelectorAll('.position-card');
    const positionEmpty = document.getElementById('positionEmpty');

    if (divisionFilter && positionCards.length > 0) {
        divisionFilter.addEventListener('change', function () {
            let visible = 0;
            const selected = divisionFilter.value;

            positionCards.forEach(card => {
                const match = selected === 'all' || card.dataset.division === selected;
                card.style.display = match ? '' : 'none';
                if (match) visible++;
            });

            if (positionEmpty) {
                positionEmpty.hidden = visible !== 0;
            }
        });
    }

    /* --------------------------------------
       2. Recruitment Tabs
    -------------------------------------- */
    const recruitmentTabs = document.querySelectorAll('.recruitment-tab');
    const recruitmentPanel = document.getElementById('recruitmentPanel');

    const recruitmentContent = {
        open: {
            label: 'REGISTRATION OPEN',
            title: 'Pendaftaran rekrutmen sedang dibuka!',
            description: 'Pilih posisi yang sesuai dengan minat dan kemampuanmu. Baca detail persyaratan sebelum melakukan pendaftaran.'
        },
        soon: {
            label: 'STAY TUNED',
            title: 'Belum ada rekrutmen yang dibuka saat ini',
            description: 'Informasi rekrutmen berikutnya akan diumumkan melalui kanal resmi House Ilmu Indonesia.'
        },
        closed: {
            label: 'RECRUITMENT CLOSED',
            title: 'Rekrutmen telah selesai',
            description: 'Terima kasih kepada seluruh pendaftar yang telah berpartisipasi dalam proses rekrutmen House Ilmu Indonesia.'
        }
    };

    if (recruitmentTabs.length > 0 && recruitmentPanel) {
        recruitmentTabs.forEach(tab => {
            tab.addEventListener('click', function () {
                recruitmentTabs.forEach(item => item.classList.remove('active'));
                this.classList.add('active');

                const content = recruitmentContent[this.dataset.status] || recruitmentContent.soon;
                recruitmentPanel.innerHTML = `
                    <span class="recruitment-label">${content.label}</span>
                    <h3>${content.title}</h3>
                    <p>${content.description}</p>
                `;
            });
        });
    }

    /* --------------------------------------
       3. Alumni Carousel
    -------------------------------------- */
    const alumniGrid = document.getElementById('alumniGrid');
    const nextButton = document.querySelector('.alumni-next');
    const prevButton = document.querySelector('.alumni-prev');

    if (alumniGrid && nextButton && prevButton) {
        const step = () => {
            const card = alumniGrid.querySelector('.alumni-card');
            if (!card) return 320;
            const gap = parseFloat(getComputedStyle(alumniGrid).gap) || 16;
            return card.getBoundingClientRect().width + gap;
        };

        nextButton.addEventListener('click', () => {
            alumniGrid.scrollBy({ left: step(), behavior: 'smooth' });
        });

        prevButton.addEventListener('click', () => {
            alumniGrid.scrollBy({ left: -step(), behavior: 'smooth' });
        });
    }
}
