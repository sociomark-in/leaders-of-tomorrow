<main>
    <section class="section pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url("awards") ?>">Leaders of Tomorrow Awards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Frequently Asked Questions</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-xl-auto col-lg-8 col-md-10 col-12">
                    <div class="page-title">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto">
                                <img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
                            </div>
                            <div class="col-auto">
                                <h1>Faq's</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .accordion-button:not(.collapsed) {
           background-color: #b72026;
            color: white; 
            font-size: 1.2rem;
            font-weight: 600;
            box-shadow:none;
        }
        .accordion-button{
           font-weight: 600;
        }
    </style>
    <section class="section pb-0 mb-4" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($faq as $key => $item) : ?>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $key; ?>">
                                    <button class="accordion-button <?php echo ($key !== 0) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="<?php echo ($key === 0) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $key; ?>">
                                        <?php echo $key + 1; ?>. <?php echo $item['que']; ?>
                                    </button>
                                </h2>

                                <div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse <?php echo ($key === 0) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?php echo $item['answer']; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-0 d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="card glass-card">
                        <div class="card-body">
                            <div class="desc text-lg">
                                <p data-aos="fade-left">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nam rem eum necessitatibus et maiores tempora nisi vel officia corporis porro quibusdam dolore beatae autem ea quae asperiores in incidunt, veritatis consequuntur, quia tenetur laudantium quam ipsa. Consequuntur eaque quos iusto sit, sunt ullam tempore ratione provident? Magni, iusto mollitia.
                                </p>
                                <p data-aos="fade-left" data-aos-delay="400">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nam rem eum necessitatibus et maiores tempora nisi vel officia corporis porro quibusdam dolore beatae autem ea quae asperiores in incidunt, veritatis consequuntur, quia tenetur laudantium quam ipsa. Consequuntur eaque quos iusto sit, sunt ullam tempore ratione provident? Magni, iusto mollitia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="d-none" id="categories">
        <div class="container">
            <div class="row g-3">
                <div class="col-12">
                    <div class="section-title">
                        <h2><span>Award Categories</span></h2>
                    </div>
                </div>
                <div class="col-12">
                    <ul class="nav nav-pills gap-2 mb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">MSME Awards</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Individual Awards</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row g-2">
                                <?php foreach ($categories['msme'] as $key => $category) : ?>
                                    <div class="col-xxl-4 col-lg-6">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row h-100 flex-column justify-content-between">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <h5><?= $category['name'] ?></h5>
                                                            <p>Lorem ipsum dolor sit amet.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <a href="<?= base_url('dashboard/category/' . $category['code'] . "/nominate") ?>" class="btn btn-red">Apply Now</a>
                                                        <a href="<?= base_url('awards/category/' . $category['code']) ?>" class="btn">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="row g-2">
                                <?php foreach ($categories['individual'] as $key => $category) : ?>
                                    <div class="col-xxl-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row h-100 flex-column justify-content-between">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <h5><?= $category['name'] ?></h5>
                                                            <p>Lorem ipsum dolor sit amet.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <a href="<?= base_url('awards/category/' . $category['code'] . "/nominate") ?>" class="btn btn-red">Apply Now</a>
                                                        <a href="<?= base_url('awards/category/' . $category['code']) ?>" class="btn">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="live" class="pb-0 d-none">
        <div class="container">
            <div class="row justify-content-center g-4">
                <div class="col-12">
                    <div class="media-content">
                        <iframe class="w-100" src="https://www.youtube.com/embed/gF5_3m-rS2A?si=7__x3paYx0udxCkk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="speakers" class="pb-0 d-none">
        <div class="container">
            <div class="row g-3">
                <div class="col-12">
                    <div class="section-title">
                        <h2><span>List of Speakers</span></h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="swiper speakerSwiper">
                        <div class="swiper-wrapper">
                            <?php for ($i = 0; $i < 12; $i++) : ?>
                                <div class="swiper-slide p-3">
                                    <div class="speaker-tile normal">
                                        <div class="photo mb-3">
                                            <img src="<?= base_url('assets/images/cities/person.png') ?>" class="w-100" alt="">
                                        </div>
                                        <div class="desc text-center">
                                            <h5>Lorem ipsum dolor sit.</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, nostrum.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                    <script>
                        new Swiper(".speakerSwiper", {
                            slidesPerView: 2,
                            breakpoints: {
                                640: {
                                    slidesPerView: 3,
                                    spaceBetween: 20,
                                },
                                1024: {
                                    slidesPerView: 4,
                                    spaceBetween: 50,
                                },
                                1400: {
                                    slidesPerView: 5,
                                    spaceBetween: 30,
                                },
                            },
                        })
                    </script>
                </div>
            </div>
        </div>
    </section>
    <section id="grand-juries" class="pb-0 d-none">
        <div class="container">
            <div class="row g-3">
                <div class="col-12">
                    <div class="section-title">
                        <h2><span>List of Grand Juries</span></h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="swiper jurySwiper">
                        <div class="swiper-wrapper">
                            <?php for ($i = 0; $i < 12; $i++) : ?>
                                <div class="swiper-slide p-3">
                                    <div class="speaker-tile normal">
                                        <div class="photo mb-3">
                                            <img src="<?= base_url('assets/images/cities/person.png') ?>" class="w-100" alt="">
                                        </div>
                                        <div class="desc text-center">
                                            <h5>Lorem ipsum dolor sit.</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, nostrum.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                    <script>
                        new Swiper(".jurySwiper", {
                            slidesPerView: 2,
                            breakpoints: {
                                640: {
                                    slidesPerView: 3,
                                    spaceBetween: 20,
                                },
                                1024: {
                                    slidesPerView: 4,
                                    spaceBetween: 50,
                                },
                                1400: {
                                    slidesPerView: 5,
                                    spaceBetween: 30,
                                },
                            },
                        })
                    </script>
                </div>
            </div>
        </div>
    </section>
    <section id="pre-juries" class=" d-none">
        <div class="container">
            <div class="row g-3">
                <div class="col-12">
                    <div class="section-title">
                        <h2><span>List of Pre-juries</span></h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="swiper preJurySwiper">
                        <div class="swiper-wrapper">
                            <?php for ($i = 0; $i < 12; $i++) : ?>
                                <div class="swiper-slide p-3">
                                    <div class="speaker-tile normal">
                                        <div class="photo mb-3">
                                            <img src="<?= base_url('assets/images/cities/person.png') ?>" class="w-100" alt="">
                                        </div>
                                        <div class="desc text-center">
                                            <h5>Lorem ipsum dolor sit.</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, nostrum.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                    <script>
                        new Swiper(".preJurySwiper", {
                            slidesPerView: 2,
                            breakpoints: {
                                640: {
                                    slidesPerView: 3,
                                    spaceBetween: 20,
                                },
                                1024: {
                                    slidesPerView: 4,
                                    spaceBetween: 50,
                                },
                                1400: {
                                    slidesPerView: 5,
                                    spaceBetween: 30,
                                },
                            },
                        })
                    </script>
                </div>
            </div>
        </div>
    </section>
</main>