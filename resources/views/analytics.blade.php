<x-layout>
    <x-slot:title>
        Analytics
    </x-slot>
    <h1>Analytics</h1>
    <div class="analytics-container">
        <div>
            <span>Total:</span> <span>{{$total}}</span>
        </div>
        <div>
            <span>Easy:</span> <span>{{$totalEasy}}</span>
        </div>
        <div>
            <span>Full:</span> <span>{{$totalFull}}</span>
        </div>
        <div>
            <span>Interviews:</span> <span>{{$totalInterviews}}</span>
        </div>
        <div>
            <span>Offers:</span> <span>{{$totalOffers}}</span>
        </div>
        <div>
            <span>Contacted:</span> <span>{{$totalContacted}}</span>
        </div>
        <div>
            <span>Cover letters:</span> <span>{{$totalCoverLetters}}</span>
        </div>
    </div>
</x-layout>