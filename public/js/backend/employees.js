(function () {

    FTX.Employees = {

        list: {
            selectors: {
                employees_table: $('#employees-table'),
            },
            init: function() {
                this.selectors.employees_table.dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.employees_table.data('ajax_url'),
                        type: 'post',
                    },

                    columns: [{
                            data: 'full_name',
                            name: 'employees.content',
                        },
                        {
                            data: 'phone_number',
                            name: 'employees.type',
                        },
                        {
                            data: 'position',
                            name: 'employees.position',
                        },
                        {
                            data: 'salary',
                            name: 'employees.salary',
                        },
                        {
                            data: 'created_at',
                            name: 'employees.created_at',
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            searchable: false,
                            sortable: false
                        }

                    ],
                    order: [
                        [3, "asc"]
                    ],
                    searchDelay: 500,
                    "createdRow": function(row, data, dataIndex) {
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