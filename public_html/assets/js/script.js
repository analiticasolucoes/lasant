function dataTableInit(table, options = {}) {
    table = "#" + table;
    const defaultOptions = {
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/pt-BR.json',
        }
    };

    // Mescla as opções padrão com as opções personalizadas
    const settings = Object.assign({}, defaultOptions, options);

    $(table).DataTable(settings);
}