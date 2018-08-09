<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin') }}">
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/makanan-minuman') }}">
                        Makanan Minuman
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/pesanan') }}">
                        Pesanan Aktif
                    </a>
                </li>
            </ul>
        </div>
        @if(Auth::user()->role == "pelayan")
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/pesanan/'.Auth::user()->id) }}">
                        Pesanan dari anda 
                    </a>
                </li>
            </ul>
        </div>
        @endif
    </div>
</div>
