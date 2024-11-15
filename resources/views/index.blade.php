<x-layout>
    <section class="hero">
        <div class="hero-image">
            <div class="hero-text d-flex flex-column align-items-center justify-content-center">
                <p class="fs-3 -fw-medium" style="margin: 0; padding: 0;">
                    Stay Quietly No Worries.
                </p>
                <p class="fs-1 fw-bold">
                    Find Hotels and Rooms Easy.
                </p>
            </div>
            <div class="hero-search d-flex align-items-end justify-content-center">
                <div class="search-box">
                    <ul class="reset-lists d-flex align-items-end justify-content-start custom-gap-4">
                        <li>
                            <a href="#" class="reset-list active-list fw-bold ps-2">FIND</a>
                        </li>
                        <li>
                            <a href="{{ route('hotels') }}" class="reset-list">Hotels</a>
                        </li>
                        <li>
                            <a href="#" class="reset-list">Rooms</a>
                        </li>
                        <li>
                            <a href="#" class="reset-list">Flats</a>
                        </li>
                        <li>
                            <a href="#" class="reset-list">Villas</a>
                        </li>
                    </ul>
                    <div class="search-form">
                        <form action="" class="d-flex align-items-center justify-content-evenly custom-gap-2">
                            <div class="form-content">
                                <div class="text-start">
                                    <label class="text-start">Location</label>
                                </div>
                                <div class="d-flex flex-column justify-content-start">
                                    <button class="costum-btn btn dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Which city do you prefer?
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Hotel Purple Lilya</a></li>
                                        <li><a class="dropdown-item" href="#">Villa Green Tropic</a></li>
                                        <li><a class="dropdown-item" href="#">Summer Rose Hotel</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="divider">|</div>
                            <div class="form-content">
                                <div class="text-start">
                                    <label class="text-start">Check In</label>
                                </div>
                                <div class="d-flex flex-column justify-content-start">
                                    <button class="costum-btn btn dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Add Dates
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <input type="date" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="divider">|</div>
                            <div class="form-content">
                                <div class="text-start">
                                    <label class="text-start">Check Out</label>
                                </div>
                                <div class="d-flex flex-column justify-content-start">
                                    <button class="costum-btn btn dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Add Dates
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <input type="date" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="divider">|</div>
                            <div class="form-content">
                                <div class="search-btn">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
