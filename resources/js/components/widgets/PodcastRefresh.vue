<script setup>
import { ref, getCurrentInstance } from 'vue';
import {
    Widget,
    Button,
    Dropdown,
    DropdownMenu,
    DropdownItem,
    DropdownSeparator,
    StatusIndicator,
    Listing,
    ListingTableHead as TableHead,
    ListingTableBody as TableBody,
    ListingPagination as Pagination,
} from '@statamic/cms/ui';

const { proxy } = getCurrentInstance();
const listingKey = ref(0);
const refreshing = ref(false);

const requestUrl = cp_url('collections/podcasts/entries');

const actions = {
    sync: { key: 'sync', label: 'Sync new', icon: 'add' },
    reimport: { key: 'reimport', label: 'Full re-import', icon: 'synchronize' },
};

const currentAction = ref(actions.sync);

async function run(action) {
    currentAction.value = action;
    refreshing.value = true;
    try {
        await proxy.$axios.post('/cp/widgets/refresh-podcasts', { mode: action.key });
        listingKey.value++;
    } finally {
        refreshing.value = false;
    }
}
</script>

<template>
    <Listing
        :key="listingKey"
        :url="requestUrl"
        :columns="[
            { label: 'Title', field: 'title', visible: true },
            { label: 'Date', field: 'date', visible: true },
        ]"
        :per-page="5"
        :show-pagination-totals="false"
        :show-pagination-page-links="false"
        :show-pagination-per-page-selector="false"
        sort-column="date"
        sort-direction="desc"
    >
        <template #initializing>
            <Widget title="Podcasts" icon="audio">
                <div class="flex flex-col px-4 py-3">
                    <ui-skeleton v-for="i in 5" :key="i" class="h-[1.25rem] mb-[0.375rem] w-full" />
                </div>
            </Widget>
        </template>

        <template #default="{ items, loading }">
            <Widget title="Podcasts" icon="audio" :href="cp_url('collections/podcasts/entries')">
                <ui-description v-if="!items.length" class="flex-1 flex items-center justify-center">
                    {{ __('No podcast episodes yet.') }}
                </ui-description>

                <div class="px-4 py-3">
                    <table class="w-full widget-table" :class="{ 'opacity-50': loading }">
                        <TableHead :sr-only="true" />
                        <TableBody>
                            <template #cell-title="{ row: entry }">
                                <div class="flex items-center gap-2">
                                    <StatusIndicator :status="entry.status" />
                                    <a :href="entry.edit_url" class="line-clamp-1 overflow-hidden text-ellipsis">{{ entry.title }}</a>
                                </div>
                            </template>
                            <template #cell-date="{ row: entry }">
                                <div
                                    v-if="entry.date"
                                    class="text-end font-inter tabular-nums text-xs whitespace-nowrap text-gray-600 dark:text-gray-400 antialiased px-2"
                                    v-text="entry.date.date ? new Date(entry.date.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) : ''"
                                />
                            </template>
                        </TableBody>
                    </table>
                </div>

                <template #actions>
                    <Pagination />
                    <div class="flex">
                        <Button
                            size="sm"
                            variant="default"
                            :loading="refreshing"
                            :disabled="refreshing"
                            :text="refreshing ? 'Working…' : currentAction.label"
                            :icon="currentAction.icon"
                            class="rounded-r-none"
                            @click="run(currentAction)"
                        />
                        <Dropdown align="end">
                            <template #trigger>
                                <Button
                                    size="sm"
                                    variant="default"
                                    icon="chevron-down"
                                    :icon-only="true"
                                    :disabled="refreshing"
                                    class="rounded-l-none border-l-0"
                                />
                            </template>
                            <DropdownMenu>
                                <DropdownItem
                                    text="Sync new"
                                    icon="add"
                                    @click="run(actions.sync)"
                                />
                                <DropdownSeparator />
                                <DropdownItem
                                    text="Full re-import"
                                    icon="synchronize"
                                    variant="destructive"
                                    @click="run(actions.reimport)"
                                />
                            </DropdownMenu>
                        </Dropdown>
                    </div>
                </template>
            </Widget>
        </template>
    </Listing>
</template>
