<div>
    @if($question)
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><b>Question #{{ $question->id }}: {{ $question->title }}</b></div>
                    <form class="row mx-2 needs-validation" wire:submit.prevent="submit">
                        <div class="card-body">
                            <input id="answer" type="text" class="form-control" name="answer" wire:input="getResponse($event.target.value)" wire:model="answer"
                                   placeholder="Type you answer here.." required/>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit"> Process</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if($response)
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"><b>Answer: </b></div>

                        <div class="card-body">
                            {!! $response !!}
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @else

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><b>Thank You!!!</b></div>
                    <div class="card-body">
                        The fact that you are reading this message indicates that you have completed our
                        Questionnaire, and that we owe you a debt of thanks.

                        We are very appreciative of the time you have taken to assist in our analysis, and commit to
                        utilizing the information gained to contemplate and implement
                        worthwhile improvements.

                        Once again, we are extremely grateful for your contributing your valuable time, your honest
                        information, and your thoughtful suggestions.
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
