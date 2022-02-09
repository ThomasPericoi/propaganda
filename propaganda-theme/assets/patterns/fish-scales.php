<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2.5);">
    <defs>
        <pattern id='fish-scales' patternUnits='userSpaceOnUse' width='20' height='20' transform-origin='<?php echo $args['transform-origin']; ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration']; ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--secondary)' />
            <path d='M-10-10A10 10 0 00-20 0a10 10 0 0010 10A10 10 0 010 0a10 10 0 00-10-10zM10-10A10 10 0 000 0a10 10 0 0110 10A10 10 0 0120 0a10 10 0 00-10-10zM30-10A10 10 0 0020 0a10 10 0 0110 10A10 10 0 0140 0a10 10 0 00-10-10zM-10 10a10 10 0 00-10 10 10 10 0 0010 10A10 10 0 010 20a10 10 0 00-10-10zM10 10A10 10 0 000 20a10 10 0 0110 10 10 10 0 0110-10 10 10 0 00-10-10zM30 10a10 10 0 00-10 10 10 10 0 0110 10 10 10 0 0110-10 10 10 0 00-10-10z' stroke-width='0.55' stroke='var(--white)' fill='none' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#fish-scales)' />
</svg>