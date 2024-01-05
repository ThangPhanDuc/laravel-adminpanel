(function () {

    FTX.Leaves = {

        list: {
           
            selectors: {
                leaves_table: $('#leaves-table'),
            },

            init: function () {

                this.selectors.leaves_table.dataTable({
                    
                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.leaves_table.data('ajax_url'),
                        type: 'post',
                    },
                    columns: [

                        { data: 'user_id', name: 'leaves.user_id' },
                        { data: 'leave_type', name: 'leaves.leave_type' },
                        { data: 'start_date', name: 'leaves.start_date' },
                        { data: 'end_date', name: 'leaves.end_date' },
                        { data: 'status', name: 'leaves.status' },
                        { data: 'created_at', name: 'leaves.created_at' },
                        { data: 'actions', name: 'actions', searchable: false, sortable: false }

                    ],
                    order: [[3, "asc"]],
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