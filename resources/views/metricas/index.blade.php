@extends('dashboard.app')
@section('content')
    <section class="nftmax-adashboard nftmax-show">
        <div class="container">
            <div class="row">
                <div class="col-12 nftmax-main__column">
                    <div class="nftmax-body">
                        <!-- Dashboard Inner -->
                        <div class="nftmax-dsinner">

                            <div class="nftmax-table mg-top-40">
                                <div class="nftmax-table__heading">
                                    <h3 class="nftmax-table__title mb-0">All NFTS Update <span class="nftmax-table__badge">435</span></h3>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="table_1" role="tabpanel" aria-labelledby="table_1">
                                        <!-- NFTMax Table -->
                                        <table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v2 table table-bordered table-hover w-100">
                                            <!-- NFTMax Table Head -->
                                            <thead class="nftmax-table__head">
                                                <tr>
                                                    <th class="nftmax-table__column-1">All Products</th>
                                                    <th class="nftmax-table__column-2">Value</th>
                                                    <th class="nftmax-table__column-3">USD</th>
                                                    <th class="nftmax-table__column-4">24H%</th>
                                                    <th class="nftmax-table__column-5">Bids</th>
                                                    <th class="nftmax-table__column-6">Time</th>
                                                    <th class="nftmax-table__column-7">Status</th>
                                                </tr>
                                            </thead>
                                            <!-- NFTMax Table Body -->
                                            <tbody class="nftmax-table__body">
                                                @foreach ($usuario as $us)
                                                <tr>
                                                    <td class="nftmax-table__column-1">
                                                        <div class="nftmax-table__product">
                                                            <div class="nftmax-table__product-img">
                                                                <img src="img/nft-table-img1.png" alt="#" class="img-fluid rounded">
                                                            </div>
                                                            <div class="nftmax-table__product-content">
                                                                <h4 class="nftmax-table__product-title">{{$us->name}}</h4>
                                                                <p class="nftmax-table__product-desc">Owned by <a href="#">Xoeyam</a></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="nftmax-table__column-2">
                                                        <div class="nftmax-table__amount nftmax-table__text-one">
                                                            <img src="img/eth-icon.png" alt="#" class="nftmax-table__icon"><span class="nftmax-table__text">7473 ETH</span>
                                                        </div>
                                                    </td>
                                                    <td class="nftmax-table__column-3">
                                                        <div class="nftmax-table__amount nftmax-table__text-two">
                                                            <img src="img/usd-icon.png" alt="#" class="nftmax-table__icon"><span class="nftmax-table__text">6392.99$</span>
                                                        </div>
                                                    </td>
                                                    <td class="nftmax-table__column-4">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-rcolor">-24.75 (11.5%)</p>
                                                    </td>
                                                    <td class="nftmax-table__column-5">
                                                        <p class="nftmax-table__text nftmax-table__bid-text">343</p>
                                                    </td>
                                                    <td class="nftmax-table__column-6">
                                                        <p class="nftmax-table__text nftmax-table__time">2 Hours 1 min 30s</p>
                                                    </td>
                                                    <td class="nftmax-table__column-7">
                                                        <div class="nftmax-table__status nftmax-sbcolor">Active</div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- End NFTMax Table -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
