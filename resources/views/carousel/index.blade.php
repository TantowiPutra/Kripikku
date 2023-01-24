<div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img class="carousel-image" style="filter: brightness(90%);"
                src="{{ asset('storage/' . $featured_products[0]->product_thumbnail) }}" class="d-block w-100"
                alt="...">
            <div class="carousel-caption d-none d-md-block">
                <a href="/home/products/{{ $featured_products[0]->id }}" style="text-decoration: none;">
                    <h3 class="font-bolder font-color-orange-gradient">{{ $featured_products[0]->product_name }}</h5>
                </a>
                <p class="font-bold text-white">
                    {{ substr(strip_tags($featured_products[0]->description), 0, 200) }}.... <a
                        href="/home/products/{{ $featured_products[0]->id }}" style="text-decoration: none;"
                        style="color: ">Lihat Selengkapnya</a></p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img class="carousel-image" style="filter: brightness(90%);"
                src="{{ asset('storage/' . $featured_products[1]->product_thumbnail) }}" class="d-block w-100"
                alt="...">
            <div class="carousel-caption d-none d-md-block">
                <a href="/home/products/{{ $featured_products[1]->id }}" style="text-decoration: none;">
                    <h3 class="font-bolder font-color-orange-gradient">{{ $featured_products[1]->product_name }}</h5>
                </a>
                <p class="font-bold text-white">
                    {{ substr(strip_tags($featured_products[1]->description), 0, 200) }}.... <a
                        href="/home/products/{{ $featured_products[1]->id }}" style="text-decoration: none;"
                        style="color: ">Lihat Selengkapnya</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="carousel-image" style="filter: brightness(90%);"
                src="{{ asset('storage/' . $featured_products[2]->product_thumbnail) }}" class="d-block"
                alt="...">
            <div class="carousel-caption d-none d-md-block">
                <a href="/home/products/{{ $featured_products[2]->id }}" style="text-decoration: none;">
                    <h3 class="font-bolder font-color-orange-gradient">{{ $featured_products[2]->product_name }}</h5>
                </a>
                <p class="font-bold text-white">
                    {{ substr(strip_tags($featured_products[3]->description), 0, 200) }}.... <a
                        href="/home/products/{{ $featured_products[2]->id }}" style="text-decoration: none;">Lihat
                        Selengkapnya</a></p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
