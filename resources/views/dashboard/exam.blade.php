<x-dashboard>
    <section class="exam-container h-full w-full flex justify-center items-center">
        <div class="exam-page">
            <h1 class="text-blue-800 title text-center uppercase font-semibold">Perceived Stress Scale</h1>
            <h3 class="text-center text-red-500">For each question choose from the following alternatives:</h3>
            <h3 class="text-center text-red-500">0 - never 1 - almost never 2 - sometimes 3 - fairly often 4 - very often</h3>
            <div class="form-container bg-gray-100 p-7">
                <div class="questions-column">
                    <form action="/exam" method="post">
                        @csrf
                        @foreach ($questions as $question)
                            @php
                                $currentQuestion = $loop->iteration
                            @endphp
                            <div class="mb-8 flex content-between">
                                <div class="question w-11/12">
                                {{$loop->iteration}}. {{ $question->question }}
                                </div>
                                <div class="radbutt flex justify-center align-center">
    
                                    @foreach ($question->answers as $answer)
                                        <div class="flex items-center mr-2 mb-2">
                                            <input id="q{{$currentQuestion}}{{$loop->iteration}}" type="radio" name="question{{$currentQuestion}}" class="hidden" value="{{$answer}}" required/>
                                            <label for="q{{$currentQuestion}}{{$loop->iteration}}" class="radio-exam flex items-center cursor-pointer h-5 w-5 text-xs">
                                                {{$loop->index}}
                                            </label>
                                        </div>
    
                                        {{-- <label for="radio3" class="">
                                            {{$loop->index}}
                                        </label>
                                        <input id="radio3" type="radio" name="radio" class="hidden" /> --}}
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="flex justify-end ">
                            <button type="submit" class="text-white p-2 rounded  bg-blue-400 hover:bg-blue-500">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-dashboard>