    @php
        use App\Models\Team;
        $teams = Team::where('status', 1)->get();
    @endphp
    <section class="team-sec space">
        <div class="container z-index-common">
            <div class="title-area text-center">
                <span class="sub-title"><img src="{{ asset('assets/site/img/theme-img/title_shape_1.svg') }}"
                        alt="shape">TEAM MEMBER</span>
                <h2 class="sec-title">See Our Skilled Expert <span class="text-theme">Team</span></h2>
            </div>
            <div class="row slider-shadow as-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2"
                data-sm-slide-show="2" data-xs-slide-show="1" data-infinite="false" data-arrows="true">

                @foreach($teams as $team)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="as-team team-card">
                            <div class="team-img">
                                <img src="{{ $team->image }}" alt="{{ $team->name }}">
                            </div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p1"></div>
                                <div class="team-social">
                                    <a target="_blank" href="{{ $team->facebook }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                    <a target="_blank" href="{{ $team->instagram }}"><i
                                            class="fab fa-instagram"></i></a>
                                    <a target="_blank" href="{{ $team->linkedin }}"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                                <h3 class="box-title"><a href="#">{{ $team->name }}</a></h3>
                                <span class="team-desig">{{ $team->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="shape-mockup" data-bottom="0" data-left="0">
            <div class="particle-2" id="particle-2"></div>
        </div>
    </section>
