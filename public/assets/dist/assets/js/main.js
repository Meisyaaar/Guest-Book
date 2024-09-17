let sidebarItems = document.querySelectorAll('.sidebar-item.has-sub');

// Fungsi untuk menghapus kelas 'active' dari semua sidebar items
function deactivateAllSidebarItems() {
    sidebarItems.forEach(function(item) {
        item.classList.remove('active');
        let submenu = item.querySelector('.submenu');
        if (submenu) {
            submenu.classList.remove('active');
            submenu.style.display = "none";
        }
    });
}

// Looping untuk menambahkan event listener pada setiap sidebar item
for (var i = 0; i < sidebarItems.length; i++) {
    let sidebarItem = sidebarItems[i];

    sidebarItems[i].querySelector('.sidebar-link').addEventListener('click', function(e) {
        e.preventDefault();

        // Nonaktifkan semua sidebar items
        deactivateAllSidebarItems();

        // Aktifkan sidebar item yang diklik
        sidebarItem.classList.add('active');

        let submenu = sidebarItem.querySelector('.submenu');
        if (submenu) {
            submenu.style.display = "block";
            submenu.classList.add('active');
        }

        slideToggle(submenu, 300);
    });
}

// Perfect Scrollbar Init
if(typeof PerfectScrollbar == 'function') {
    const container = document.querySelector(".sidebar-wrapper");
    const ps = new PerfectScrollbar(container, {
        wheelPropagation: false
    });
}

// Scroll into active sidebar
document.querySelector('.sidebar-item.active').scrollIntoView(false)
