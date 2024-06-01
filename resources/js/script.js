lucide.createIcons();
const btnToggleSidebar = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');

btnToggleSidebar.addEventListener('click', () => {
    sidebar.classList.toggle('sidebar-close');
    sessionStorage.setItem('sidebar', sidebar.classList.contains('sidebar-close') ? 'true' : 'false');
});

if (sessionStorage.getItem('sidebar') === 'true') {
    sidebar.classList.add('sidebar-close');
}
