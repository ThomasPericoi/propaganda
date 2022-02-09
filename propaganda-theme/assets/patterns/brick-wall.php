<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2.5);">
    <defs>
        <pattern id='brick-wall' patternUnits='userSpaceOnUse' width='30' height='30' transform-origin='<?php echo $args['transform-origin']; ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration']; ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--secondary)' />
            <path d='M0 22.5h30v15H0zm15-15h30v15H15m-30-15h30v15h-30zm15-15h30v15H0z' stroke-width='1' stroke='var(--white)' fill='none' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#brick-wall)' />
</svg>