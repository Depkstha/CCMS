@props(['route', 'columns'])

<table id="datatable" class="display table-sm table-bordered table">
    <thead class="table-light">
        <tr class="text-center">
            @foreach ($columns as $index => $column)
                <th class="tb-col"><span class="overline-title">{{ $column['title'] }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endpush

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let table = $('#datatable').DataTable({
                processing: true,
                reordering: true,
                serverSide: true,
                // dom: "Bfrtip",
                // buttons: ["copy", "csv", "excel", "print"],
                ajax: "{{ $route }}",
                columns: @json($columns),
            });

            $("#table-body").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {

                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');

                $('tr.tableRow').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('menus.reorder') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == true) {
                            console.log(response.message);
                            window.location.reload();
                        } else {
                            console.log(response);
                        }
                    }
                });
            }

            //   if ($.fn.DataTable.isDataTable('#datatable')) {
            //     $('#datatable').DataTable().destroy();
            //   }

            $('body').on('click', '.remove-item', function(e) {
                e.preventDefault();
                let url = $(this).data('link');
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                id: id
                            },
                            success: function(response) {
                                console.log(response.message);
                                flasher.success(response.message);
                                $('#datatable').DataTable().ajax.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush