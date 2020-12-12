
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-2">

        @foreach($courses as $course)
        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
            <div class="flex items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">{{$course->course->name}}</a></div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    {{$course->course->description}}
                </div>
                @if(!$course->is_active)
                    <x-jet-button class="btn btn--stripe enroll" wire:click="enroll({{$course->course->id}})"
                                  data-identifier="{{$course->course->id}}">
                        {{ __('Enroll') }}
                    </x-jet-button>
                @else
                    @if($course->certified)
                        <button class="btn btn--stripe button" data-identifier="{{$course->course->id}}">
                        {{ __('Get Certificate') }}
                    <button>
                        <span>Curso<p class="aqui-curso">aqui curso que no se deja</p></span>
                        <span>Certificacion<p class="aqui-cert">aqui certificacion que no se deja</p></span>
                    @else
                        <x-jet-button class="btn btn--stripe button certificate"  wire:click="certificate({{$course->id}})"  data-identifier="{{$course->course->id}}">
                            {{ __('Certificate') }}
                        </x-jet-button>

                    @endif

                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>


