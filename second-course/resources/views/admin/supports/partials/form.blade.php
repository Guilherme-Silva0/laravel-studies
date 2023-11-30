@csrf
<input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}">
<textarea name="body" placeholder="Descrição" cols="30" rows="5">{{ $support->body ?? old('body') }}
</textarea>
<button type="submit">{{ $buttonText }}</button>
