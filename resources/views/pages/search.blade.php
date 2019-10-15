@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <input type="text" class="form-controller" placeholder="Product" id="search" name="search" />
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <script type="text/javascript">
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#search').on('keyup', function () {
                        $value = $(this).val();
                        $.ajax({
                            type: 'get',
                            url: '{{ route('autocomplete') }}',
                            data: {'search': $value},
                            success: function (data) {
                                $('tbody').html(data);
                            }
                        });
                    })
                </script>
            </div>
        </div>
    </div>
@endsection