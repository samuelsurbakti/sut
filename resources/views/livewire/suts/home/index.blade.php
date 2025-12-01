<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('ui.layouts.app')] class extends Component {
    public $step = 'switch-lamp';

    #[On('set_step')]
    public function set_step($step)
    {
        $this->step = $step;
    }
}; ?>

<div>
    @if ($step === 'switch-lamp')
        <livewire:suts.home.switch-lamp />
    @elseif($step === 'confetti-balloon')
        <livewire:suts.home.confetti-balloon />
    @elseif($step === 'story')
        <livewire:suts.home.story />
    @elseif($step === 'video-gallery')
        <livewire:suts.home.video-gallery />
    @elseif($step === 'cake')
        <livewire:suts.home.cake />
    @elseif($step === 'door')
        <livewire:suts.home.door />
    @elseif($step === 'firework')
        <livewire:suts.home.firework />
    @endif
</div>
