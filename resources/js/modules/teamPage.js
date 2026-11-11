/**
 * Our Team Page Interactivity: Division Filter & Carousel Track Navigation
 */
export function initTeamPage() {
    const teamPage = document.querySelector('.team-page');
    if (!teamPage) return;

    // Filter Divisi
    const filter = document.getElementById('divisionFilter');
    if (filter) {
        filter.addEventListener('change', function () {
            const selected = this.value;
            document.querySelectorAll('.division-section').forEach(section => {
                if (selected === 'all' || section.dataset.division === selected) {
                    section.style.display = '';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    }

    // Carousel buttons
    document.querySelectorAll('.team-group').forEach(group => {
        const track = group.querySelector('.team-track');
        const prev = group.querySelector('.prev-btn');
        const next = group.querySelector('.next-btn');

        if (track && prev && next) {
            prev.addEventListener('click', () => {
                track.scrollBy({ left: -250, behavior: 'smooth' });
            });
            next.addEventListener('click', () => {
                track.scrollBy({ left: 250, behavior: 'smooth' });
            });
        }
    });
}
