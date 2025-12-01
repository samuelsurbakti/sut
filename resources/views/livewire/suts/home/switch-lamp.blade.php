<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public function turn_on()
    {
        $this->dispatch('set_step', step: 'confetti-balloon');
    }
}; ?>

<div class="sl_root">
    <main class="sl_container">
        <div class="sl_col sl_col--dark">
            <button id="btn2" class="sl_btn" type="button" aria-pressed="false">
                <svg class="sl_btn__icon" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true">
                    <g stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <polyline points="12,1 12,10" />
                        <circle fill="none" cx="12" cy="13" r="9" stroke-dasharray="49.48 7.07" stroke-dashoffset="10.6" />
                    </g>
                </svg>
                <span class="sl_btn__sr">Power (Dark)</span>
            </button>
        </div>
    </main>
</div>

@script
    <script>
        $(document).ready(function () {
            $(document).on('click', '#btn2', function () {
                setTimeout(() => {
                    $(this).fadeOut(1000, function() {
                        $('.sl_col').addClass('light-on');
                        // setTimeout(() => {
                        //     Livewire.dispatch('set_step', { step: 'confetti-balloon' });
                        // }, 200);
                    });
                }, 1200);
            });
        });
    </script>
@endscript
