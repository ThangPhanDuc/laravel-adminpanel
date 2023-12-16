(function () {

    FTX.Products = {

        list: {
            selectors: {
                products_table: $('#products-table'),
            },
            init: function () {
                this.selectors.products_table.dataTable({
                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.products_table.data('ajax_url'),
                        type: 'post',
                    },

                    columns: [{
                        data: 'name',
                        name: 'products.name',
                        searchable: true
                    },
                    {
                        data: 'code',
                        name: 'products.code',
                        searchable: true,
                    },
                    {
                        data: 'unit_price',
                        name: 'products.unit_price',
                        searchable: false,
                    },
                    {
                        data: 'discount',1
                        name: 'products.discount',
                        searchable: false,
                    },
                    {
                        data: 'final_price',
                        name: 'products.final_price',
                        searchable: false,
                    },
                    {
                        data: 'category_name',
                        name: 'products.category_id',
                        searchable: false,
                    },
                    {
                        data: 'created_at',
                        name: 'products.created_at', 
                        searchable: false,
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        searchable: false,
                        sortable: false
                    }
                    ],
                    order: [
                        [5, "asc"]
                    ],
                    searchDelay: 500,
                    "createdRow": function (row, data, dataIndex) {
                        FTX.Utils.dtAnchorToForm(row);
                    }
                });
            }
        },

        edit: {
            selectors: {
                tags: jQuery(".tags"),
                categories: jQuery(".categories"),
                status: jQuery(".status"),
                publish_datetime: jQuery("#publish_datetime"),
            },

            init: function (locale) {
                this.addHandlers(locale);
                FTX.tinyMCE.init(locale);
            },

            addHandlers: function (locale) {

                this.selectors.tags.select2({
                    tags: true,
                    width: '100%',
                });

                this.selectors.categories.select2({
                    width: '100%',
                    tags: true,
                    placeholder: 'Select category'
                });

                this.selectors.status.select2({
                    width: '100%'
                });

                this.selectors.publish_datetime.datetimepicker({
                    locale: (locale === undefined ? 'en_US' : locale),
                });
            },
        },

    }
})();