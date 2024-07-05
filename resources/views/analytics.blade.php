<x-layout>
    <x-slot:title>
        Analytics
    </x-slot>
    <h1>Analytics</h1>
    <div class="analytics-container">
        <x-analytic label="Total" value={{$total}} />
        <x-analytic label="Easy" value={{$totalEasy}} />
        <x-analytic label="Full" value={{$totalFull}} />
        <x-analytic label="Interviews" value={{$totalInterviews}} />
        <x-analytic label="Offers" value={{$totalOffers}} />
        <x-analytic label="Contacted" value={{$totalContacted}} />
        <x-analytic label="Cover letters" value={{$totalCoverLetters}} />
    </div>
</x-layout>