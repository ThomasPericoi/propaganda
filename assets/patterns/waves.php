<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2);">
    <defs>
        <pattern id='waves' patternUnits='userSpaceOnUse' width='16.591' height='26.667' transform-origin='<?php echo $args['transform-origin'] ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration'] ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M-4.887 15.766c-.06 0-.123.04-.123.102-.102 1.023.082 2.086.471 3.089a7.997 7.997 0 001.8 2.72A8.89 8.89 0 00.064 23.52a8.884 8.884 0 003.334.655 8.807 8.807 0 003.335-.655c1.064-.43 2.025-1.044 2.803-1.841a7.997 7.997 0 001.8-2.721 7.655 7.655 0 00.353-1.178 7.62 7.62 0 00.363 1.239 7.994 7.994 0 001.8 2.72 8.449 8.449 0 002.803 1.842 8.807 8.807 0 003.334.655 8.807 8.807 0 003.335-.655 8.89 8.89 0 002.803-1.841 7.711 7.711 0 001.8-2.721c.164-.389.266-.798.368-1.207v-1.984c-.06-.02-.102 0-.143.04-.9 1.78-2.086 3.15-3.518 4.092a8.773 8.773 0 01-4.665 1.412 8.624 8.624 0 01-4.665-1.391c-1.419-.913-2.615-2.269-3.493-4.045-.002-.023-.002-.045-.005-.067 0-.02-.02-.062-.06-.082-.062-.02-.144 0-.165.06-.88 1.8-2.086 3.172-3.518 4.093a8.476 8.476 0 01-4.665 1.41c-1.636 0-3.232-.47-4.664-1.39-1.432-.92-2.619-2.311-3.519-4.091-.02-.041-.06-.062-.102-.102z' stroke-width='1' stroke='none' fill='var(--primary)' />
            <path d='M-11.553 2.432c-.062 0-.123.04-.123.102-.103 1.023.082 2.087.47 3.09a7.997 7.997 0 001.8 2.72 8.89 8.89 0 002.803 1.841 8.884 8.884 0 003.335.655 8.807 8.807 0 003.335-.655c1.063-.43 2.025-1.043 2.802-1.84a7.997 7.997 0 001.8-2.722 7.655 7.655 0 00.353-1.178 7.62 7.62 0 00.364 1.24 7.994 7.994 0 001.8 2.72 8.449 8.449 0 002.802 1.841 8.807 8.807 0 003.335.655 8.807 8.807 0 003.335-.655 8.89 8.89 0 002.802-1.84 7.711 7.711 0 001.801-2.722c.164-.388.266-.797.368-1.206V2.493c-.061-.02-.102 0-.143.04-.9 1.78-2.086 3.15-3.518 4.092a8.773 8.773 0 01-4.665 1.412 8.624 8.624 0 01-4.665-1.391C7.22 5.733 6.022 4.377 5.145 2.6l-.005-.067c0-.02-.02-.062-.06-.082-.062-.02-.145 0-.165.061-.88 1.8-2.086 3.171-3.518 4.092a8.476 8.476 0 01-4.665 1.411c-1.637 0-3.232-.47-4.664-1.39-1.432-.922-2.619-2.312-3.519-4.092-.02-.041-.061-.062-.102-.102z' stroke-width='1' stroke='none' fill='var(--primary)' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#waves)' />
</svg>