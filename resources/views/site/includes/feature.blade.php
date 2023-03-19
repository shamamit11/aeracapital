@php
    use App\Models\PageSection;
    $section = PageSection::where('id', 2)->first();
@endphp
    <div class="space-top" data-bg-src="{{asset('assets/site/img/bg/why_bg_1.png')}}">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-xxl-7 col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box2">
                        <div class="img1">
                            <img src="{{ @$section->image }}" alt="{!! @$section->caption !!}">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6">
                    <div class="title-area mb-35">
                        <span class="sub-title"><img src="{{asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="{{ @$section->caption }}">{{ @$section->caption }}</span>
                        <h2 class="sec-title">{!! @$section->title !!}</h2>
                    </div>
                    <p class="mt-n2 mb-30">{!! @$section->main_text !!}</p>
                    <div class="two-column">
                        <div class="checklist style2">
                            <ul>
                                <li><i class="far fa-check"></i> {{ @$section->list_01_text }}</li>
                                <li><i class="far fa-check"></i> {{ @$section->list_02_text }}</li>
                                <li><i class="far fa-check"></i> {{ @$section->list_03_text }}</li>
                            </ul>
                        </div>
                        <div class="checklist style2">
                            <ul>
                                <li><i class="far fa-check"></i> {{ @$section->list_04_text }}</li>
                                <li><i class="far fa-check"></i> {{ @$section->list_05_text }}</li>
                                <li><i class="far fa-check"></i> {{ @$section->list_06_text }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>