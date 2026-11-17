/**
 * Our Team Page Interactivity (Gaya 3 Enhanced: Division Blocks Filter)
 */
export function initTeamPage() {
    const teamPage = document.querySelector('.team-page');
    if (!teamPage) return;

    const filterSelect = document.getElementById('divisionFilter');
    const filterPills = document.querySelectorAll('.filter-pill');
    const divisionBlocks = document.querySelectorAll('.division-block');
    const emptyState = document.getElementById('galleryEmptyState');

    function applyFilter(selected) {
        let visibleCount = 0;

        divisionBlocks.forEach(block => {
            const matches = (selected === 'all' || block.dataset.division === selected);
            if (matches) {
                block.style.display = 'block';
                visibleCount++;
            } else {
                block.style.display = 'none';
            }
        });

        if (emptyState) {
            emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        // Update pills active state
        filterPills.forEach(pill => {
            if (pill.dataset.filter === selected) {
                pill.classList.add('active');
            } else {
                pill.classList.remove('active');
            }
        });

        // Update select value
        if (filterSelect && filterSelect.value !== selected) {
            filterSelect.value = selected;
        }
    }

    if (filterSelect) {
        filterSelect.addEventListener('change', function () {
            applyFilter(this.value);
        });
    }

    filterPills.forEach(pill => {
        pill.addEventListener('click', function () {
            applyFilter(this.dataset.filter);
        });
    });
}
