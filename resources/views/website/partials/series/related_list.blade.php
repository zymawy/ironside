@foreach($lessons as $lesson)
    @if($loop->first)
        <nav class="level">
            <!-- Left side -->
            <div class="level-left">
                <div class="level-item">
                    <i class="fa fa-info-circle"></i>
                </div>
            </div>

            <!-- Right side -->
            <div class="level-right">
                <p class="level-item"><strong>
                        الدرس التالي
                    </strong></p>
            </div>
        </nav>
    @endif
    <article class="media related-card">
        <div class="media-content is-right text-right">
            <div class="content is-right text-right">
                <p>
                    <a href="{{ route('student.series.show.lesson',[$series->slug,$lesson->uuid]) }}">
                        {{ $lesson->title }}
                    </a>
                </p>
                <p>
                    {!!  $lesson->description  !!}
                </p>
            </div>
        </div>
        <div class="media-right">
            <figure class="image">
                <a href="{{ route('student.series.show.lesson',[$series->slug,$lesson->uuid]) }}">
                    <button class="button badge" data-badge="{{ $loop->iteration }}">{{ $loop->iteration }}</button>
                </a>
            </figure>
        </div>
    </article>

    @if($loop->first)
        <hr>
    @endif
@endforeach