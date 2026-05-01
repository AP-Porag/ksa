@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Labels</h4>
                        <div class="">
                            <download-component/>
                        </div>
{{--                        <div class="d-flex">--}}
{{--                            <a href="{{route('admin.label.print.view')}}" class="btn btn-sm btn-success text-capitalize" style="padding-top: 8px;margin-right: 15px;">Print Labels</a>--}}
{{--                            <a href="{{route('admin.label.create')}}" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;">Create New Label</a>--}}
{{--                        </div>--}}
                    </div>
                    {!! $dataTable->table(['class'=>'table-responsive']) !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    @include('includes.styles.datatable')
@endpush

@push('script')
    @include('includes.scripts.datatable')

{{--    <script>--}}
{{--        let selectedIds = [];--}}

{{--        $(document).on('change', '.row-checkbox', function () {--}}
{{--            const id = $(this).val();--}}

{{--            if (this.checked) {--}}
{{--                selectedIds.push(id);--}}
{{--            } else {--}}
{{--                selectedIds = selectedIds.filter(i => i !== id);--}}
{{--            }--}}

{{--            console.log(selectedIds)--}}

{{--            window.selectedEntryIds = selectedIds; // 🔥 expose globally--}}
{{--        });--}}
{{--    </script>--}}

    <script>
        $(document).on('init.dt', function () {
            $('th:first').html(`
        <input type="checkbox" id="select-all" style="cursor:pointer;">
        <label style="margin-left:5px; cursor: pointer;">Select All</label>
    `).width('100px');
        });
        let selectedIds = [];

        // Select All toggle
        $(document).on('change', '#select-all', function () {
            const isChecked = this.checked;

            $('.row-checkbox').each(function () {
                $(this).prop('checked', isChecked);

                const id = $(this).val();

                if (isChecked) {
                    if (!selectedIds.includes(id)) {
                        selectedIds.push(id);
                    }
                } else {
                    selectedIds = [];
                }
            });

            window.selectedEntryIds = selectedIds;
            console.log(selectedIds)
        });

        // Individual checkbox
        $(document).on('change', '.row-checkbox', function () {
            const id = $(this).val();

            if (this.checked) {
                if (!selectedIds.includes(id)) {
                    selectedIds.push(id);
                }
            } else {
                selectedIds = selectedIds.filter(i => i != id);
            }

            // Update "Select All" state
            const total = $('.row-checkbox').length;
            const checked = $('.row-checkbox:checked').length;

            $('#select-all').prop('checked', total === checked);

            window.selectedEntryIds = selectedIds;
            console.log(selectedIds)
        });
        $(document).on('draw.dt', function () {
            $('#select-all').prop('checked', false);
        });
    </script>
@endpush
