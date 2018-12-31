<form action="{{ route('student.series.lesson.comment',[$series->slug,$lesson->uuid]) }}" method="POST">
    @csrf

    @if(isset($parent_id))
        <input type="hidden" name="parent_id" value="{{$parent_id}}">
    @endif
    <div class="field">
        <p class="control">
            <textarea class="textarea" rows="2"  name="comment"
                      placeholder="{{ isset($parent_id) ? " لديك رد {$comment->user->fullname}" : 'اكتب عن اي استفسار او توضيح' }}"
            ></textarea>
        </p>
    </div>
    <div class="field">
        <p class="control">
            <button type="submit" class="button">{{ isset($parent_id) ? " رد " : 'اضافة تعليق' }}</button>
        </p>
    </div>
</form>