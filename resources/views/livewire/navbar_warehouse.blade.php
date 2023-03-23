<div class="row align-items-center">
    <div class="col-lg-4 col-sm-8">
        <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link mb-0 px-0 py-1 {{ Request::is('gudang/lisaccecories') ? 'active' : '' }} active" data-bs-toggle="erp" href="/gudang/lisaccecories" role="erp" aria-selected="{{ Request::is('gudang/lisaccecories') ? 'erp' : 'false' }}">
                       Item List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1  {{ Request::is('gudang/order') ? 'active' : '' }}" data-bs-toggle="order" href="/gudang/order" role="order" aria-selected="false">
                        Order List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 {{ Request::is('gudang/detail') ? 'active' : '' }}" data-bs-toggle="order" href="/gudang/detail" role="order" aria-selected="false">
                       Detail
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="../../../examples/pages/account/invoice.html" role="tab" aria-selected="false">
                        Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="../../../examples/pages/account/security.html" role="tab" aria-selected="false">
                        Backup
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
