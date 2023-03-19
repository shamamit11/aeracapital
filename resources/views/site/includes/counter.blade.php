    @php
        use App\Models\Counter;
        $counters = Counter::limit(4)->get();
    @endphp
    <div class="space-top" data-pos-for=".team-sec" data-sec-pos="bottom-half">
        <div class="container z-index-common">
            <div class="counter-card-wrap" data-bg-src="{{asset('assets/site/img/bg/counter_bg_2.png')}}">
                <div class="row gy-40 justify-content-between">
                    @foreach($counters as $count)
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="counter-card_icon">
                                <img src="{{$count->image}}" alt="{{$count->caption}}">
                            </div>
                            <div class="media-body">
                                <h2 class="counter-card_number"><span class="counter-number">{{$count->title}}</span></h2>
                                <p class="counter-card_text">{{$count->caption}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>