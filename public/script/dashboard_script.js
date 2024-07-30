document.addEventListener("DOMContentLoaded", function () {
    const fakeScrollbar = document.querySelector('.fake-scrollbar');
    const tableWrapper = document.querySelector('.table-responsive');

    // Sinkronisasi scroll horizontal
    fakeScrollbar.addEventListener('scroll', function () {
        tableWrapper.scrollLeft = fakeScrollbar.scrollLeft;
    });

    tableWrapper.addEventListener('scroll', function () {
        fakeScrollbar.scrollLeft = tableWrapper.scrollLeft;
    });

    // Menyesuaikan lebar fake scrollbar dengan lebar konten tabel
    const table = tableWrapper.querySelector('table');
    const fakeScrollbarContent = document.createElement('div');
    fakeScrollbarContent.style.width = table.scrollWidth + 'px';
    fakeScrollbar.appendChild(fakeScrollbarContent);
});
