@extends('admin.layouts.dashboard-layout')

@section('title', 'Sermons')

@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    {{-- <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        <div class="alert-text">
            The Metronic Datatable component supports local or remote data source. For the local data you can pass javascript array as data source. In this example the grid fetches its
            data from a javascript array data source. It also defines
            the schema model of the data source. In addition to the visualization, the Datatable provides built-in support for operations over data such as sorting, filtering and
            paging performed in user browser(frontend).
        </div>
    </div> --}}
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                  Sermons
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('admin.sermons.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New Sermon
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <a href="#" class="btn btn-clean btn-icon-sm">
                        <i class="la la-long-arrow-left"></i>
                        Back
                    </a>
                    &nbsp;

                </div>
            </div> --}}
        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="row align-items-center">
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

            <!--begin: Datatable -->
            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                <table class="kt-datatable__table" style="display: block;">
                    <thead class="kt-datatable__head"><tr class="kt-datatable__row" style="left: 0px;">
                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                            <span style="width: 110px;">Title</span>
                        </th>
                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                            <span style="width: 110px;">Bible Text</span>
                        </th>
                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                            <span style="width: 110px;">Date Published</span>
                        </th>
                        <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                            <span style="width: 110px;">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="kt-datatable__body" style="">
                    @forelse ($sermons as $sermon)
                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                            <td data-field="OrderID" class="kt-datatable__cell">
                                <span style="width: 110px;">{{$sermon->title}}</span>
                            </td>
                            <td data-field="OrderID" class="kt-datatable__cell">
                                <span style="width: 110px;">{{$sermon->bible_text }}</span>
                            </td>
                            <td data-field="Country" class="kt-datatable__cell">
                                <span style="width: 110px;">{{ $sermon->published_date }}</span>
                            </td>
                            <td data-field="CompanyName" class="kt-datatable__cell">
                                <span style="width: 110px;">View</span>
                            </td>
                        </tr>
                    @empty

                        <div class="container" style="text-align:center">
                            <span> No Sermons Yet </span>
                        </div>

                    @endforelse
                </tbody>
            </table>
            <div class="kt-datatable__pager kt-datatable--paging-loaded">
                <ul class="kt-datatable__pager-nav" style="display: none;">
                    <li>
                        <a title="First" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled">
                            <i class="flaticon2-fast-back"></i>
                        </a>
                    </li>
                    <li>
                        <a title="Previous" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled">
                            <i class="flaticon2-back"></i>
                        </a>
                    </li>
                    <li style=""></li>
                    <li style="display: none;">
                        <input type="text" class="kt-pager-input form-control" title="Page number">
                    </li>
                    <li>
                        <a class="kt-datatable__pager-link kt-datatable__pager-link-number kt-datatable__pager-link--active" data-page="1" title="1">1</a>
                    </li>
                    <li style=""></li>
                    <li>
                        <a title="Next" class="kt-datatable__pager-link kt-datatable__pager-link--next kt-datatable__pager-link--disabled" data-page="1" disabled="disabled">
                            <i class="flaticon2-next"></i>
                        </a>
                    </li>
                    <li>
                        <a title="Last" class="kt-datatable__pager-link kt-datatable__pager-link--last kt-datatable__pager-link--disabled" data-page="1" disabled="disabled">
                            <i class="flaticon2-fast-next"></i>
                        </a>
                    </li>
                </ul>
                {{-- <div class="kt-datatable__pager-info">
                    <div class="dropdown bootstrap-select kt-datatable__pager-size" style="width: 60px;">
                        <select class="selectpicker kt-datatable__pager-size" data-width="60px" data-selected="10" tabindex="-98">
                            <option class="bs-title-option" value=""></option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="combobox" aria-owns="bs-select-5" aria-haspopup="listbox" aria-expanded="false" title="Select page size">
                            <div class="filter-option">
                                <div class="filter-option-inner">
                                    <div class="filter-option-inner-inner">10</div>
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu ">
                            <div class="inner show" role="listbox" id="bs-select-5" tabindex="-1">
                                <ul class="dropdown-menu inner show" role="presentation">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <span class="kt-datatable__pager-detail">Showing 1 - 1 of 1</span>
                </div> --}}
            </div>
        </div>

            <!--end: Datatable -->
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>

    $(document).ready(function () {

        @if(Session::has('success'))
            Swal.fire(
                'Success!',
                '{{Session::get('success')}}',
                'success'
            )
            console.log('Hi')
        @endif
    });

</script>
@endsection
