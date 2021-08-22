<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(1.5);">
    <defs>
        <pattern id='plants' patternUnits='userSpaceOnUse' width='40' height='68.436' transform-origin='<?php echo $args['transform-origin'] ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration'] ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M20 68.436V55.93c0-4.071 2.36-7.847 6.372-10.03C31.092 43.244 36.46 41.533 40 34.218v12.507c0 4.071-2.36 7.847-6.372 10.03C28.85 59.41 23.481 61.179 20 68.436zm0-17.108V38.82c0-4.07-2.36-7.846-6.372-10.03C8.908 26.137 3.54 24.426 0 17.11v12.507c0 4.07 2.36 7.846 6.372 10.03C11.15 42.3 16.519 44.07 20 51.326z' stroke-width='1' stroke='none' fill='var(--primary)' />
            <path d='M20 85.545V73.038c0-4.07-2.36-7.847-6.372-10.03C8.908 60.354 3.54 58.643 0 51.327v12.507c0 4.071 2.36 7.847 6.372 10.03C11.15 76.519 16.519 78.289 20 85.545zm0-68.436V4.602c0-4.07-2.36-7.847-6.372-10.03C8.908-8.082 3.54-9.793 0-17.108v12.506C0-.53 2.36 3.245 6.372 5.428 11.15 8.083 16.519 9.853 20 17.109zm0 17.11V21.71c0-4.07 2.36-7.846 6.372-10.03C31.092 9.028 36.46 7.317 40 .002v12.507c0 4.07-2.36 7.846-6.372 10.03C28.85 25.191 23.481 26.961 20 34.217z' stroke-width='1' stroke='none' fill='var(--primary)' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#plants)' />
</svg>