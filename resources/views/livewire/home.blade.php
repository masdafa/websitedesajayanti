<div wire:poll.5s>
    <x-home.hero :heroItems="$heroItems" />
    <x-home.quick-stats :totalResidents="$totalResidents" :totalFacilities="$totalFacilities" />
    <x-home.facilities :facilities="$facilities" />
    <x-home.staff :staffs="$staffs" />
    <x-home.agendas :upcomingAgendas="$upcomingAgendas" />
    <x-home.news :latestPosts="$latestPosts" :latestPengumuman="$latestPengumuman" />
    <x-home.gallery :galleries="$galleries" />
    <x-home.map :mapImage="$settings['housing_map_image'] ?? null" />
    <x-home.cta />
</div>