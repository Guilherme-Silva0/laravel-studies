@csrf
<div class="bg-slate-800 flex flex-col gap-2 w-fit p-4 rounded-lg shadow-lg">
    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}"
        class="block w-full py-1.5 pr-5 border rounded-lg md:w-80 placeholder-gray-400/70 pl-2 bg-slate-900 text-gray-300 border-gray-600  focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
    <textarea name="body" placeholder="Descrição" rows="3"
        class="resize-none block w-full py-1.5 pr-5 border rounded-lg md:w-80 placeholder-gray-400/70 pl-2 bg-slate-900 text-gray-300 border-gray-600  focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">{{ $support->body ?? old('body') }}</textarea>
    <button type="submit"
        class="bg-blue-600 w-fit px-3 py-1 rounded transition-all text-gray-100 hover:scale-110">{{ $buttonText }}</button>
</div>
