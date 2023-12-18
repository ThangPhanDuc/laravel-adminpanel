(function () {

    FTX.Tickets = {

        list: {
            selectors: {
                tickets_table: $('#tickets-table'),
            },
            init: function() {
                console.log("123");
                this.selectors.tickets_table.dataTable({
                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.tickets_table.data('ajax_url'),
                        type: 'post',
                    },

                    columns: [{
                            data: 'content',
                            name: 'tickets.content',
                        },
                        {
                            data: 'type',
                            name: 'tickets.type',
                        },
                        {
                            data: 'expected',
                            name: 'tickets.expected',
                        },
                        {
                            data: 'status',
                            name: 'tickets.status',
                        },
                        {
                            data: 'link',
                            name: 'tickets.link',
                        },
                        {
                            data: 'response',
                            name: 'tickets.response',
                        },
                        {
                            data: 'user_id',
                            name: 'tickets.user_id',
                        },
                        {
                            data: 'created_at',
                            name: 'tickets.created_at',
                        },

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
    }
})();
