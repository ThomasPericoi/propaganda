<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2);">
    <defs>
        <pattern id='chinese-pattern' patternUnits='userSpaceOnUse' width='75' height='75' transform-origin='<?php echo $args['transform-origin'] ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration'] ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M.068 14.543c-.022 0-.045.005-.068.007v17.257l.024-.001c3.153 0 5.404 2.45 5.705 5.45 0 .1.05.15.05.3 0 .1 0 .2-.05.3-.294 3.027-2.593 5.427-5.729 5.446v17.152l.024.002c.2 0 .45-.05.65-.25 4.855-4.15 10.708-6.75 16.362-9.55 4.152-2.05 9.056-4.25 12.058-8 2.101-2.65 2.502-6.2.8-9.15-2.201-3.8-6.754-6-10.457-7.95-6.403-3.3-13.208-6.05-18.712-10.75a.989.988 0 00-.657-.263zM75 14.55c-.21.016-.423.098-.626.256-4.853 4.15-10.706 6.75-16.361 9.55-4.152 2.05-9.055 4.25-12.057 8-2.102 2.65-2.503 6.2-.8 9.15 2.2 3.8 6.753 6 10.456 7.95 6.404 3.3 13.209 6.05 18.712 10.75.2.2.45.25.651.25l.025-.002v-17.2c-.06-.001-.116.004-.175.002-3.003-.15-5.455-2.7-5.455-5.7 0-3.075 2.562-5.655 5.63-5.696zM20.088 31.806c3.152 0 5.403 2.45 5.704 5.45 0 .1.05.15.05.3 0 .1 0 .2-.05.3-.3 3.1-2.703 5.55-5.954 5.45-3.003-.15-5.455-2.7-5.455-5.7 0-3.2 2.603-5.8 5.705-5.8zm34.923.05c3.153 0 5.404 2.45 5.705 5.45 0 .1.05.15.05.3-.05 0-.05.1-.05.2-.3 3.1-2.703 5.55-5.954 5.45-3.003-.15-5.455-2.7-5.455-5.7 0-3.1 2.603-5.7 5.704-5.7zm-35.017 1.957c-1.895-.006-3.759 1.218-3.759 3.693 0 4.95 7.456 4.9 7.706 0-.125-2.45-2.052-3.687-3.947-3.693zm34.905 0c-1.889-.006-3.74 1.218-3.74 3.693 0 4.95 7.405 4.9 7.705 0-.15-2.45-2.076-3.687-3.964-3.693zm20.082 0c-1.895-.006-3.759 1.218-3.759 3.693 0 2.492 1.877 3.714 3.778 3.691v-2.094a.51.51 0 01-.225-.047c-.751-.15-1.352-.8-1.302-1.6.05-.824.711-1.502 1.527-1.542v-2.1l-.02-.001zM0 33.816v2.093l.024-.003c.85 0 1.602.7 1.602 1.6 0 .8-.601 1.4-1.352 1.55-.1.05-.15.05-.25.05L0 39.105v2.091c1.872-.035 3.754-1.27 3.877-3.69-.124-2.42-2.004-3.655-3.877-3.69zm20.088 2.09c.85 0 1.602.7 1.602 1.6 0 .8-.6 1.4-1.352 1.55-.1.05-.15.05-.25.05s-.2 0-.3-.05c-.751-.15-1.352-.8-1.302-1.6.05-.8.751-1.55 1.602-1.55zm34.923 0c.85 0 1.602.7 1.602 1.6 0 .8-.601 1.4-1.352 1.55-.1.05-.15.05-.25.05s-.2 0-.3-.05c-.75-.15-1.352-.8-1.302-1.6.05-.85.751-1.55 1.602-1.55z' stroke-width='1' stroke='none' fill='var(--primary)' />
            <path d='M7.318 0a7.825 7.825 0 001.037 4.002c2.2 3.8 6.749 6.001 10.448 7.951 6.398 3.3 13.195 6.05 18.693 10.75.2.2.45.25.65.25l.026-.002v.004l.025.002c.2 0 .45-.05.65-.25 4.85-4.15 10.696-6.75 16.344-9.55 4.149-2.05 9.046-4.25 12.045-8A8.392 8.392 0 0069.074 0H63.98c.002.022.01.028.01.057 0 .1-.001.198-.051.298-.3 3.1-2.699 5.552-5.948 5.452-2.999-.15-5.449-2.702-5.449-5.702 0-.035.005-.07.006-.105h-8.611c.002.022.01.028.01.057 0 .1-.001.198-.051.298-.293 3.028-2.59 5.43-5.723 5.448V5.75c-.06 0-.116.004-.176.002-2.999-.15-5.447-2.7-5.447-5.7V0h-8.615c.007.034.015.05.015.102-.05 0-.049.1-.049.2-.3 3.1-2.7 5.55-5.949 5.45-2.999-.15-5.447-2.7-5.447-5.7L12.508 0h-5.19zm7.036 0v.002c0 4.95 7.399 4.9 7.699 0V0h-2.25v.002c0 .8-.6 1.4-1.35 1.55-.1.05-.15.05-.25.05s-.199 0-.299-.05C17.17 1.407 16.582.779 16.605 0h-2.251zm20.044 0v.002c0 2.492 1.874 3.714 3.774 3.691v.004c1.87-.036 3.75-1.271 3.873-3.691V0h-2.248v.006c0 .8-.6 1.4-1.35 1.55-.1.05-.15.05-.25.05h-.025V1.6a.506.506 0 01-.225-.047C37.213 1.406 36.627.778 36.65 0h-2.252zm19.995 0v.006c0 4.95 7.447 4.9 7.697 0V0h-2.25v.008c0 .8-.6 1.399-1.35 1.549-.1.05-.15.05-.25.05s-.2 0-.3-.05C57.202 1.409 56.616.78 56.642 0h-2.25zM38.24 52.043c-.022 0-.045.006-.068.008v-.004c-.21.015-.422.098-.625.256-4.849 4.15-10.696 6.749-16.344 9.549-4.148 2.05-9.048 4.25-12.047 8A8.393 8.393 0 007.318 75h5.19c.03-3.076 2.614-5.648 5.695-5.648 3.15 0 5.4 2.45 5.7 5.45 0 .067.018.133.033.198h8.615c.03-3.051 2.573-5.603 5.62-5.645v-.048h.026c3.15 0 5.398 2.449 5.698 5.449 0 .081.028.148.04.244h8.612c.057-3.15 2.629-5.693 5.693-5.693 3.15 0 5.398 2.449 5.698 5.449 0 .081.028.148.04.244h5.096a7.825 7.825 0 00-1.037-3.994c-2.2-3.8-6.746-6-10.445-7.95-6.398-3.3-13.197-6.05-18.696-10.75a.99.99 0 00-.656-.263zM18.092 71.309c-1.887-.006-3.737 1.217-3.738 3.691h2.251c.001-.016-.002-.03-.001-.047.05-.85.75-1.55 1.6-1.55A1.61 1.61 0 0119.803 75h2.25c-.151-2.449-2.075-3.685-3.961-3.691zm20.06 0C36.26 71.303 34.4 72.526 34.398 75h2.252c0-.016-.003-.03-.002-.047.049-.824.709-1.503 1.524-1.543.008 0 .017-.004.025-.004a1.61 1.61 0 011.6 1.594h2.248c-.126-2.416-2.004-3.648-3.873-3.684v-.005l-.02-.002zm19.994.004c-1.891-.006-3.75 1.216-3.753 3.687h2.25c0-.015-.003-.028-.002-.043.05-.8.75-1.549 1.6-1.549A1.61 1.61 0 0159.84 75h2.25c-.128-2.446-2.052-3.681-3.944-3.687z' stroke-width='1' stroke='none' fill='var(--secondary)' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#chinese-pattern)' />
</svg>