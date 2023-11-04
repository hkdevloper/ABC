<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
<script>
    window.googletag = window.googletag || {cmd: []};
    googletag.cmd.push(function() {
        // Define a fixed-size ad slot.
        // [START fixed_size_ad]
        googletag
            .defineSlot('/6355419/Travel/Europe/France/Paris',
                [300, 250], 'fixed-size-ad')
            .addService(googletag.pubads());
        // [END fixed_size_ad]

        // Define a multi-size ad slot.
        // [START multi_size_ad]
        googletag
            .defineSlot('/6355419/Travel/Europe',
                [[300, 250], [728, 90], [750, 200]], 'multi-size-ad')
            .addService(googletag.pubads());
        // [END multi_size_ad]

        // Define a fluid ad slot.
        // [START fluid_ad]
        googletag
            .defineSlot('/6355419/Travel', ['fluid'], 'native-ad')
            .addService(googletag.pubads());
        // [END fluid_ad]

        // Define a responsive ad slot.
        // [START responsive_ad]
        var responsiveAdSlot =
            googletag.defineSlot('/6355419/Travel/Europe',
                [[300, 250], [728, 90], [750, 200]], 'responsive-ad')
                .addService(googletag.pubads());

        var mapping =
            googletag.sizeMapping()
                .addSize([1024, 768], [[750, 200], [728, 90]])
                .addSize([640, 480], [300, 250])
                .addSize([0, 0], [])
                .build();

        responsiveAdSlot.defineSizeMapping(mapping);
        // [END responsive_ad]

        // Enable SRA and services.
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
    });
</script>
<style>
    .ad-container {
        border: solid;
        width: 100%;
    }

    .ad-slot {
        border-style: dashed;
        display: inline-block;
    }

    .native-slot {
        width: 50%;
    }
</style>
