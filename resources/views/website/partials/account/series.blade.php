
<div class="box" dir="rtl">
    <article class="media">
        <div class="media-content" style="text-align: right; float: right" dir="rtl">
            <div class="content" >
                <p>
                    <strong>
                        <a href="{{route('student.series.index',$series->slug)}}" style="color: #1E4D92;">
                           {{ $series->title }}
                        </a>
                    </strong>
                    <br>
                   <p>{{ $series->description }}</p>
                </p>
            </div>
            <nav class="is-mobile">
                <section class="accordions">
                    <article class="accordion">
                        <div class="accordion-header toggle is-meshal">
                            <p>محتوى الدورة</p>
                            <button class="toggle" aria-label="toggle"></button>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content" dir="rtl">
                                @if($series->lessons->count())
                                    @foreach($series->lessons as $lesson)
                                        <div class="box">
                                            <article class="media">
                                                <div class="media-content" style="text-align:right">
                                                    <div class="content">
                                                        <p>
                                                            <strong>
                                                                <a  target="_blank" href="{{route('student.series.show.lesson',[$series->slug,$lesson->uuid])}}">
                                                                    {{$lesson->title}}
                                                                </a>
                                                            </strong>
                                                            <br>
                                                            {{$lesson->description}}
                                                        </p>
                                                    </div>
                                                    <nav class="level is-mobile">
                                                    </nav>
                                                </div>
                                                <div class="media-right">
                                                    <figure class="image is-64x64">
                                                        <a target="_blank" href="{{ route('student.series.show.lesson',[$series->slug,$lesson->uuid]) }}">
                                                            <button class="button badge" data-badge="{{ $loop->iteration }}">{{ $loop->iteration }}</button>
                                                        </a>
                                                        {{--<img src="{!!  $lesson->covoerd  !!}" alt="{{$lesson->title}}">--}}
                                                    </figure>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </article>
                </section>
            </nav>
        </div>
    </article>
</div>

