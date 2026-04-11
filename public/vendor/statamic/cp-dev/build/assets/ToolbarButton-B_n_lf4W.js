import { r as __toESM } from "./chunk-Cve5ssgY.js";
import { At as toDisplayString, B as openBlock, C as createVNode, Dt as normalizeClass, G as renderSlot, K as resolveComponent, S as createTextVNode, W as renderList, _ as createBlock, at as withDirectives, b as createSlots, f as Fragment, g as createBaseVNode, it as withCtx, q as resolveDirective, u as withModifiers, v as createCommentVNode, y as createElementBlock } from "./vue.esm-bundler-Br3h1vy5.js";
import { Ci as Primitive, Cr as require_fuzzysort, qi as Button_default, ra as _plugin_vue_export_helper_default } from "./ui-CEN2B9Qh.js";
import { a as Editor_default } from "./Selector-Zs_v8zqj.js";
//#region resources/js/components/fieldtypes/assets/Asset.js
var Asset_default = {
	components: { AssetEditor: Editor_default },
	props: {
		asset: Object,
		readOnly: Boolean,
		showFilename: {
			type: Boolean,
			default: true
		},
		showSetAlt: {
			type: Boolean,
			default: true
		}
	},
	data() {
		return { editing: false };
	},
	computed: {
		isViewable() {
			return this.asset.isViewable;
		},
		isImage() {
			return this.asset.isImage;
		},
		canShowSvg() {
			return this.asset.extension === "svg";
		},
		container() {
			return this.asset.id.substr(0, this.asset.id.indexOf("::"));
		},
		canBeTransparent() {
			return [
				"png",
				"svg",
				"webp",
				"avif"
			].includes(this.asset.extension);
		},
		thumbnail() {
			return this.asset.thumbnail;
		},
		label() {
			return this.asset.basename;
		},
		needsAlt() {
			return (this.asset.isImage || this.asset.isSvg) && !this.asset.values.alt;
		}
	},
	methods: {
		editOrOpen() {
			if (!this.isViewable) return;
			return this.readOnly ? this.open() : this.edit();
		},
		edit() {
			if (this.readOnly) return;
			this.editing = true;
		},
		remove() {
			if (this.readOnly) return;
			this.$emit("removed", this.asset);
		},
		open() {
			if (!this.asset.url) return this.download();
			window.open(this.asset.url, "_blank");
		},
		download() {
			window.open(this.asset.downloadUrl);
		},
		closeEditor() {
			this.editing = false;
		},
		assetSaved(asset) {
			this.$emit("updated", asset);
			this.closeEditor();
		},
		actionCompleted(successful, response) {
			if (successful === false) return;
			const id = response.ids[0] || null;
			if (id && id !== this.asset.id) this.$emit("id-changed", id);
			this.closeEditor();
		}
	}
};
//#endregion
//#region resources/js/components/fieldtypes/bard/buttons.js
var availableButtons = () => [
	{
		name: "h1",
		text: __("Heading 1"),
		command: (editor, args) => editor.chain().focus().toggleHeading(args).run(),
		activeName: "heading",
		args: { level: 1 },
		svg: "h1"
	},
	{
		name: "h2",
		text: __("Heading 2"),
		command: (editor, args) => editor.chain().focus().toggleHeading(args).run(),
		activeName: "heading",
		args: { level: 2 },
		svg: "h2"
	},
	{
		name: "h3",
		text: __("Heading 3"),
		command: (editor, args) => editor.chain().focus().toggleHeading(args).run(),
		activeName: "heading",
		args: { level: 3 },
		svg: "h3"
	},
	{
		name: "h4",
		text: __("Heading 4"),
		command: (editor, args) => editor.chain().focus().toggleHeading(args).run(),
		activeName: "heading",
		args: { level: 4 },
		svg: "h4"
	},
	{
		name: "h5",
		text: __("Heading 5"),
		command: (editor, args) => editor.chain().focus().toggleHeading(args).run(),
		activeName: "heading",
		args: { level: 5 },
		svg: "h5"
	},
	{
		name: "h6",
		text: __("Heading 6"),
		command: (editor, args) => editor.chain().focus().toggleHeading(args).run(),
		activeName: "heading",
		args: { level: 6 },
		svg: "h6"
	},
	{
		name: "bold",
		text: __("Bold"),
		command: (editor) => editor.chain().focus().toggleBold().run(),
		svg: "text-bold"
	},
	{
		name: "italic",
		text: __("Italic"),
		command: (editor) => editor.chain().focus().toggleItalic().run(),
		svg: "text-italic"
	},
	{
		name: "underline",
		text: __("Underline"),
		command: (editor) => editor.chain().focus().toggleUnderline().run(),
		svg: "text-underline"
	},
	{
		name: "strikethrough",
		text: __("Strikethrough"),
		command: (editor) => editor.chain().focus().toggleStrike().run(),
		activeName: "strike",
		svg: "text-strike-through"
	},
	{
		name: "small",
		text: __("Small"),
		command: (editor) => editor.chain().focus().toggleSmall().run(),
		svg: "text-small"
	},
	{
		name: "unorderedlist",
		text: __("Unordered List"),
		command: (editor) => editor.chain().focus().toggleBulletList().run(),
		activeName: "bulletList",
		svg: "list-ul"
	},
	{
		name: "orderedlist",
		text: __("Ordered List"),
		command: (editor) => editor.chain().focus().toggleOrderedList().run(),
		activeName: "orderedList",
		svg: "list-ol"
	},
	{
		name: "removeformat",
		text: __("Remove Formatting"),
		command: (editor) => editor.chain().focus().clearNodes().unsetAllMarks().run(),
		svg: "eraser"
	},
	{
		name: "quote",
		text: __("Blockquote"),
		command: (editor) => editor.chain().focus().toggleBlockquote().run(),
		activeName: "blockquote",
		svg: "quote"
	},
	{
		name: "superscript",
		text: __("Superscript"),
		command: (editor) => editor.chain().focus().toggleSuperscript().run(),
		svg: "superscript"
	},
	{
		name: "subscript",
		text: __("Subscript"),
		command: (editor) => editor.chain().focus().toggleSubscript().run(),
		svg: "subscript"
	},
	{
		name: "anchor",
		text: __("Link"),
		command: (editor) => editor.commands.setLink(),
		activeName: "link",
		svg: "insert-link",
		component: "LinkToolbarButton"
	},
	{
		name: "table",
		text: __("Table"),
		command: (editor, args) => editor.commands.insertTable(args),
		args: {
			rowsCount: 3,
			colsCount: 3,
			withHeaderRow: false
		},
		svg: "add-table"
	},
	{
		name: "image",
		text: __("Image"),
		command: (editor) => editor.commands.insertImage(),
		args: { src: "" },
		svg: "insert-image",
		condition: (config) => config.container
	},
	{
		name: "code",
		text: __("Inline Code"),
		command: (editor) => editor.commands.toggleCode(),
		svg: "code-inline"
	},
	{
		name: "codeblock",
		text: __("Code Block"),
		command: (editor) => editor.commands.toggleCodeBlock(),
		activeName: "codeBlock",
		svg: "code-block"
	},
	{
		name: "horizontalrule",
		text: __("Horizontal Rule"),
		command: (editor) => editor.commands.setHorizontalRule(),
		activeName: "horizontalRule",
		svg: "hr"
	},
	{
		name: "alignleft",
		text: __("Align Left"),
		command: (editor) => editor.chain().focus().setTextAlign("left").run(),
		svg: "paragraph-align-left"
	},
	{
		name: "aligncenter",
		text: __("Align Center"),
		command: (editor) => editor.chain().focus().setTextAlign("center").run(),
		svg: "paragraph-align-center"
	},
	{
		name: "alignright",
		text: __("Align Right"),
		command: (editor) => editor.chain().focus().setTextAlign("right").run(),
		svg: "paragraph-align-right"
	},
	{
		name: "alignjustify",
		text: __("Align Justify"),
		command: (editor) => editor.chain().focus().setTextAlign("justify").run(),
		svg: "paragraph-align-justified"
	}
];
var addButtonHtml = (buttons) => {
	return buttons.map((button) => {
		return button;
	});
};
//#endregion
//#region resources/js/components/fieldtypes/grid/ManagesRowMeta.js
var import_fuzzysort = /* @__PURE__ */ __toESM(require_fuzzysort());
var ManagesRowMeta_default = { methods: {
	updateRowMeta(row, value) {
		this.updateMeta({
			...this.meta,
			existing: {
				...this.meta.existing,
				[row]: clone(value)
			}
		});
	},
	removeRowMeta(row) {
		const { [row]: removed, ...existing } = this.meta.existing;
		this.updateMeta({
			...this.meta,
			existing
		});
	}
} };
//#endregion
//#region resources/js/components/fieldtypes/replicator/SetPicker.vue
var _sfc_main$1 = {
	emits: ["added", "clicked-away"],
	components: { Primitive },
	props: {
		sets: Array,
		enabled: {
			type: Boolean,
			default: true
		},
		align: {
			type: String,
			default: "start"
		},
		loadingSet: {
			type: String,
			default: null
		}
	},
	data() {
		return {
			selectedGroupHandle: null,
			search: null,
			selectionIndex: 0,
			keybindings: [],
			isOpen: false,
			mode: this.getStoredMode(),
			selectedTab: "all"
		};
	},
	computed: {
		showSearch() {
			return !this.hasMultipleGroups || !this.selectedGroup;
		},
		showGroupBreadcrumb() {
			return this.hasMultipleGroups && this.selectedGroup;
		},
		showGroups() {
			return this.hasMultipleGroups && !this.selectedGroup && !this.search;
		},
		hasMultipleSets() {
			return this.sets.reduce((count, group) => {
				return count + group.sets.length;
			}, 0) > 1;
		},
		hasMultipleGroups() {
			return this.sets.length > 1;
		},
		selectedGroup() {
			return this.sets.find((group) => group.handle === this.selectedGroupHandle);
		},
		selectedGroupDisplayText() {
			return this.selectedGroup ? __(this.selectedGroup.display || this.selectedGroup.handle) : null;
		},
		visibleSets() {
			if (!this.selectedGroup && !this.search) return [];
			let sets = this.selectedGroup ? this.selectedGroup.sets : this.sets.reduce((sets, group) => {
				return sets.concat(group.sets);
			}, []);
			if (this.search) sets = this.filterSetsBySearch(sets);
			return sets.filter((set) => !set.hide);
		},
		items() {
			let items = [];
			if (this.showGroups) this.sets.forEach((group) => {
				items.push({
					...group,
					type: "group"
				});
			});
			this.visibleSets.forEach((set) => {
				items.push({
					...set,
					type: "set"
				});
			});
			return items;
		},
		noSearchResults() {
			return this.search && this.visibleSets.length === 0;
		},
		iconSet() {
			return this.$config.get("replicatorSetIcons") || void 0;
		},
		groupedItems() {
			const groups = {};
			groups.all = {
				display: __("All"),
				handle: "all",
				items: []
			};
			this.sets.forEach((group) => {
				let filteredSets = group.sets.filter((set) => !set.hide);
				if (this.search) filteredSets = this.filterSetsBySearch(filteredSets);
				groups[group.handle] = {
					display: group.display || group.handle,
					handle: group.handle,
					items: filteredSets
				};
				groups.all.items = groups.all.items.concat(filteredSets);
			});
			return groups;
		},
		currentTabItems() {
			if (this.mode !== "grid") return [];
			const group = this.groupedItems[this.selectedTab];
			return group ? group.items : [];
		},
		shouldUseModal() {
			return this.mode === "grid";
		},
		isLoading() {
			return !!this.loadingSet;
		}
	},
	watch: {
		isOpen(isOpen) {
			if (isOpen) {
				if (this.sets.length === 1) this.selectedGroupHandle = this.sets[0].handle;
				this.bindKeys();
			} else this.unbindKeys();
		},
		search() {
			this.selectionIndex = 0;
		},
		selectedTab() {
			this.selectionIndex = 0;
		},
		mode() {
			this.saveMode();
		},
		loadingSet(loading, wasLoading) {
			if (wasLoading && !loading) {
				this.isOpen = false;
				this.unselectGroup();
				this.search = null;
			}
		}
	},
	methods: {
		addSet(handle) {
			this.$emit("added", handle);
		},
		selectGroup(handle) {
			this.selectedGroupHandle = handle;
			this.selectionIndex = 0;
		},
		unselectGroup() {
			this.selectedGroupHandle = null;
		},
		bindKeys() {
			this.keybindings = [
				this.$keys.bindGlobal("up", (e) => this.keypressUp(e)),
				this.$keys.bindGlobal("down", (e) => this.keypressDown(e)),
				this.$keys.bindGlobal("enter", (e) => this.keypressEnter(e)),
				this.$keys.bindGlobal("right", (e) => this.keypressRight(e)),
				this.$keys.bindGlobal("left", (e) => this.keypressLeft(e))
			];
		},
		unbindKeys() {
			this.keybindings.forEach((binding) => binding.destroy());
			this.keybindings = [];
		},
		keypressUp(e) {
			e.preventDefault();
			const items = this.mode === "grid" ? this.currentTabItems : this.items;
			this.selectionIndex = this.selectionIndex === 0 ? items.length - 1 : this.selectionIndex - 1;
		},
		keypressDown(e) {
			e.preventDefault();
			const items = this.mode === "grid" ? this.currentTabItems : this.items;
			this.selectionIndex = this.selectionIndex === items.length - 1 ? 0 : this.selectionIndex + 1;
		},
		keypressRight(e) {
			e.preventDefault();
			if (this.selectedGroup || this.search) return;
			this.keypressEnter(e);
		},
		keypressLeft(e) {
			e.preventDefault();
			this.unselectGroup();
		},
		keypressEnter(e) {
			e.preventDefault();
			const item = (this.mode === "grid" ? this.currentTabItems : this.items)[this.selectionIndex];
			if (item && item.type === "group") this.selectGroup(item.handle);
			else if (item) this.addSet(item.handle);
		},
		singleButtonClicked() {
			if (!this.enabled) return;
			this.addSet(this.sets[0].sets[0].handle);
		},
		open() {
			this.isOpen = true;
		},
		onTriggerClick(e) {
			if (!this.enabled) {
				e.stopPropagation();
				e.preventDefault();
			}
		},
		getStoredMode() {
			try {
				return localStorage.getItem("statamic.replicator.setPicker.mode") || "list";
			} catch (e) {
				return "list";
			}
		},
		saveMode() {
			try {
				localStorage.setItem("statamic.replicator.setPicker.mode", this.mode);
			} catch (e) {}
		},
		isSetLoading(handle) {
			return this.loadingSet === handle;
		},
		filterSetsBySearch(sets) {
			return import_fuzzysort.default.go(this.search, sets, {
				all: true,
				keys: [
					(set) => __(set.display),
					"handle",
					(set) => __(set.instructions)
				],
				scoreFn: (scores) => {
					const displayScore = scores[0]?.score ?? -Infinity;
					const handleScore = scores[1]?.score ?? -Infinity;
					const instructionsScore = (scores[2]?.score ?? -Infinity) * .5;
					return Math.max(displayScore, handleScore, instructionsScore);
				}
			}).map((result) => result.obj);
		}
	}
};
var _hoisted_1$1 = { class: "flex items-center p-1.5 gap-1.5" };
var _hoisted_2 = { class: "p-3 grid grid-cols-2 md:grid-cols-3 gap-6" };
var _hoisted_3 = ["onMouseover", "title"];
var _hoisted_4 = ["onClick"];
var _hoisted_5 = { class: "h-40 w-full flex items-center justify-center" };
var _hoisted_6 = ["src"];
var _hoisted_7 = { class: "line-clamp-1 text-base mt-1 text-center text-gray-900 dark:text-gray-200" };
var _hoisted_8 = {
	key: 0,
	class: "p-3 text-center text-xs text-gray-600"
};
var _hoisted_9 = { class: "flex items-center border-b border-gray-200 dark:border-gray-600 p-1.5 gap-1.5" };
var _hoisted_10 = {
	key: 0,
	class: "flex items-center p-1.5 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-600"
};
var _hoisted_11 = { class: "text-gray-700 dark:text-gray-300 text-xs px-2" };
var _hoisted_12 = { class: "max-h-[21rem] overflow-auto p-1.5 st-custom-scrollbar" };
var _hoisted_13 = ["onMouseover", "title"];
var _hoisted_14 = ["onClick"];
var _hoisted_15 = { class: "flex-1" };
var _hoisted_16 = { class: "line-clamp-1 text-sm text-gray-900 dark:text-gray-200" };
var _hoisted_17 = ["onClick"];
var _hoisted_18 = { class: "flex-1" };
var _hoisted_19 = { class: "line-clamp-1 text-sm text-gray-900 dark:text-gray-200" };
var _hoisted_20 = { class: "max-w-96 max-h-[calc(80vh)] screen-fit" };
var _hoisted_21 = {
	key: 0,
	class: "text-gray-800 dark:text-gray-200 mb-2"
};
var _hoisted_22 = ["src"];
var _hoisted_23 = {
	key: 0,
	class: "p-3 text-center text-xs text-gray-600"
};
function _sfc_render$1(_ctx, _cache, $props, $setup, $data, $options) {
	const _component_Primitive = resolveComponent("Primitive");
	const _component_ui_input = resolveComponent("ui-input");
	const _component_ui_toggle_item = resolveComponent("ui-toggle-item");
	const _component_ui_toggle_group = resolveComponent("ui-toggle-group");
	const _component_ui_tab_trigger = resolveComponent("ui-tab-trigger");
	const _component_ui_tab_list = resolveComponent("ui-tab-list");
	const _component_ui_icon = resolveComponent("ui-icon");
	const _component_ui_description = resolveComponent("ui-description");
	const _component_ui_tab_content = resolveComponent("ui-tab-content");
	const _component_ui_tabs = resolveComponent("ui-tabs");
	const _component_ui_modal = resolveComponent("ui-modal");
	const _component_ui_button = resolveComponent("ui-button");
	const _component_ui_hover_card = resolveComponent("ui-hover-card");
	const _component_ui_popover = resolveComponent("ui-popover");
	return !$options.hasMultipleSets ? (openBlock(), createBlock(_component_Primitive, {
		key: 0,
		"as-child": "",
		onClick: $options.singleButtonClicked
	}, {
		default: withCtx(() => [renderSlot(_ctx.$slots, "trigger")]),
		_: 3
	}, 8, ["onClick"])) : $options.shouldUseModal ? (openBlock(), createBlock(_component_ui_modal, {
		key: 1,
		blur: false,
		title: _ctx.__("Add Set"),
		open: $data.isOpen,
		"onUpdate:open": _cache[3] || (_cache[3] = ($event) => $data.isOpen = $event),
		class: "xl:max-w-3xl 2xl:max-w-page"
	}, {
		trigger: withCtx(() => [createVNode(_component_Primitive, {
			"as-child": "",
			onClickCapture: $options.onTriggerClick
		}, {
			default: withCtx(() => [renderSlot(_ctx.$slots, "trigger")]),
			_: 3
		}, 8, ["onClickCapture"])]),
		default: withCtx(() => [createBaseVNode("div", _hoisted_1$1, [createVNode(_component_ui_input, {
			placeholder: _ctx.__("Search Sets"),
			class: "[&_svg]:size-5",
			"input-attrs": "data-set-picker-search-input",
			"icon-prepend": "magnifying-glass",
			ref: "search",
			size: "sm",
			type: "text",
			modelValue: $data.search,
			"onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => $data.search = $event),
			variant: $data.mode === "list" ? "ghost" : "default"
		}, null, 8, [
			"placeholder",
			"modelValue",
			"variant"
		]), createVNode(_component_ui_toggle_group, {
			modelValue: $data.mode,
			"onUpdate:modelValue": _cache[1] || (_cache[1] = ($event) => $data.mode = $event),
			size: "sm"
		}, {
			default: withCtx(() => [createVNode(_component_ui_toggle_item, {
				icon: "layout-list",
				value: "list",
				"aria-label": _ctx.__("List view")
			}, null, 8, ["aria-label"]), createVNode(_component_ui_toggle_item, {
				icon: "layout-grid",
				value: "grid",
				"aria-label": _ctx.__("Grid view")
			}, null, 8, ["aria-label"])]),
			_: 1
		}, 8, ["modelValue"])]), $data.mode === "grid" ? (openBlock(), createBlock(_component_ui_tabs, {
			key: 0,
			"default-tab": "all",
			modelValue: $data.selectedTab,
			"onUpdate:modelValue": _cache[2] || (_cache[2] = ($event) => $data.selectedTab = $event),
			class: "w-full"
		}, {
			default: withCtx(() => [createVNode(_component_ui_tab_list, { class: "px-2" }, {
				default: withCtx(() => [(openBlock(true), createElementBlock(Fragment, null, renderList($options.groupedItems, (group) => {
					return openBlock(), createBlock(_component_ui_tab_trigger, {
						text: group.display,
						name: group.handle,
						key: group.handle
					}, null, 8, ["text", "name"]);
				}), 128))]),
				_: 1
			}), (openBlock(true), createElementBlock(Fragment, null, renderList($options.groupedItems, (group) => {
				return openBlock(), createBlock(_component_ui_tab_content, {
					name: group.handle,
					key: group.handle
				}, {
					default: withCtx(() => [createBaseVNode("div", _hoisted_2, [(openBlock(true), createElementBlock(Fragment, null, renderList(group.items, (item, i) => {
						return openBlock(), createElementBlock("div", {
							key: item.handle,
							class: normalizeClass(["cursor-pointer rounded-lg", {
								"bg-gray-100 dark:bg-gray-900": $data.selectionIndex === i,
								"opacity-50 pointer-events-none": $options.isLoading
							}]),
							onMouseover: ($event) => $data.selectionIndex = i,
							title: _ctx.__(item.instructions)
						}, [createBaseVNode("div", {
							onClick: ($event) => !$options.isLoading && $options.addSet(item.handle),
							class: "p-2.5"
						}, [
							createBaseVNode("div", _hoisted_5, [$options.isSetLoading(item.handle) ? (openBlock(), createBlock(_component_ui_icon, {
								key: 0,
								name: "loading",
								class: "size-8 text-gray-600 dark:text-gray-300"
							})) : item.image ? (openBlock(), createElementBlock("img", {
								key: 1,
								src: item.image,
								class: "rounded-lg h-40 object-contain bg-gray-50 dark:bg-gray-850"
							}, null, 8, _hoisted_6)) : (openBlock(), createBlock(_component_ui_icon, {
								key: 2,
								name: item.icon || "add-section",
								set: $options.iconSet,
								class: "size-8 text-gray-600 dark:text-gray-300"
							}, null, 8, ["name", "set"]))]),
							createBaseVNode("div", _hoisted_7, toDisplayString(_ctx.__(item.display || item.handle)), 1),
							item.instructions ? (openBlock(), createBlock(_component_ui_description, {
								key: 0,
								class: "text-center mb-2"
							}, {
								default: withCtx(() => [createTextVNode(toDisplayString(_ctx.__(item.instructions)), 1)]),
								_: 2
							}, 1024)) : createCommentVNode("", true)
						], 8, _hoisted_4)], 42, _hoisted_3);
					}), 128)), group.items.length === 0 ? (openBlock(), createElementBlock("div", _hoisted_8, toDisplayString($data.search ? _ctx.__("No results") : _ctx.__("No sets available")), 1)) : createCommentVNode("", true)])]),
					_: 2
				}, 1032, ["name"]);
			}), 128))]),
			_: 1
		}, 8, ["modelValue"])) : createCommentVNode("", true)]),
		_: 3
	}, 8, ["title", "open"])) : (openBlock(), createBlock(_component_ui_popover, {
		key: 2,
		align: $props.align,
		open: $data.isOpen,
		onClickedAway: _cache[6] || (_cache[6] = ($event) => _ctx.$emit("clicked-away", $event)),
		"onUpdate:open": _cache[7] || (_cache[7] = ($event) => $data.isOpen = $event),
		class: "set-picker select-none w-72 rounded-b-lg",
		"data-set-picker-popover": "",
		inset: ""
	}, {
		trigger: withCtx(() => [createVNode(_component_Primitive, {
			"as-child": "",
			onClickCapture: $options.onTriggerClick
		}, {
			default: withCtx(() => [renderSlot(_ctx.$slots, "trigger")]),
			_: 3
		}, 8, ["onClickCapture"])]),
		default: withCtx(() => [
			createBaseVNode("div", _hoisted_9, [createVNode(_component_ui_input, {
				placeholder: _ctx.__("Search Sets"),
				class: "[&_svg]:size-5",
				"input-attrs": "data-set-picker-search-input",
				"icon-prepend": "magnifying-glass",
				ref: "search",
				size: "sm",
				type: "text",
				modelValue: $data.search,
				"onUpdate:modelValue": _cache[4] || (_cache[4] = ($event) => $data.search = $event),
				variant: "ghost"
			}, null, 8, ["placeholder", "modelValue"]), createVNode(_component_ui_toggle_group, {
				modelValue: $data.mode,
				"onUpdate:modelValue": _cache[5] || (_cache[5] = ($event) => $data.mode = $event),
				size: "sm"
			}, {
				default: withCtx(() => [createVNode(_component_ui_toggle_item, {
					icon: "layout-list",
					value: "list",
					"aria-label": "List view"
				}), createVNode(_component_ui_toggle_item, {
					icon: "layout-grid",
					value: "grid",
					"aria-label": "Grid view"
				})]),
				_: 1
			}, 8, ["modelValue"])]),
			$options.showGroupBreadcrumb ? (openBlock(), createElementBlock("div", _hoisted_10, [
				createVNode(_component_ui_button, {
					onClick: $options.unselectGroup,
					size: "xs",
					variant: "ghost"
				}, {
					default: withCtx(() => [createTextVNode(toDisplayString(_ctx.__("Groups")), 1)]),
					_: 1
				}, 8, ["onClick"]),
				createVNode(_component_ui_icon, {
					name: "chevron-right",
					class: "size-3! mt-[1px]"
				}),
				createBaseVNode("span", _hoisted_11, toDisplayString($options.selectedGroupDisplayText), 1)
			])) : createCommentVNode("", true),
			createBaseVNode("div", _hoisted_12, [(openBlock(true), createElementBlock(Fragment, null, renderList($options.items, (item, i) => {
				return openBlock(), createElementBlock("div", {
					key: item.handle,
					class: normalizeClass(["cursor-pointer rounded-md", { "bg-gray-100 dark:bg-gray-900": $data.selectionIndex === i }]),
					onMouseover: ($event) => $data.selectionIndex = i,
					title: _ctx.__(item.instructions)
				}, [item.type === "group" ? (openBlock(), createElementBlock("div", {
					key: 0,
					onClick: ($event) => $options.selectGroup(item.handle),
					class: "group flex items-center rounded-lg p-2 gap-2 sm:gap-3"
				}, [
					createVNode(_component_ui_icon, {
						name: item.icon || "folder",
						set: $options.iconSet,
						class: "size-4 text-gray-600 dark:text-gray-300"
					}, null, 8, ["name", "set"]),
					createBaseVNode("div", _hoisted_15, [createBaseVNode("div", _hoisted_16, toDisplayString(_ctx.__(item.display || item.handle)), 1), item.instructions ? (openBlock(), createBlock(_component_ui_description, {
						key: 0,
						class: "w-48 truncate text-2xs"
					}, {
						default: withCtx(() => [createTextVNode(toDisplayString(_ctx.__(item.instructions)), 1)]),
						_: 2
					}, 1024)) : createCommentVNode("", true)]),
					createVNode(_component_ui_icon, {
						name: "chevron-right",
						class: "me-1 size-2"
					})
				], 8, _hoisted_14)) : createCommentVNode("", true), item.type === "set" ? (openBlock(), createElementBlock("div", {
					key: 1,
					onClick: ($event) => !$options.isLoading && $options.addSet(item.handle),
					class: normalizeClass(["group flex items-center rounded-lg p-2.5 gap-2 sm:gap-3", { "opacity-50 pointer-events-none": $options.isLoading }])
				}, [$options.isSetLoading(item.handle) ? (openBlock(), createBlock(_component_ui_icon, {
					key: 0,
					name: "loading",
					class: "size-4 text-gray-600 dark:text-gray-300"
				})) : (openBlock(), createBlock(_component_ui_icon, {
					key: 1,
					name: item.icon || "plus",
					set: $options.iconSet,
					class: "size-4 text-gray-600 dark:text-gray-300"
				}, null, 8, ["name", "set"])), createVNode(_component_ui_hover_card, {
					delay: 0,
					open: $data.selectionIndex === i
				}, createSlots({
					trigger: withCtx(() => [createBaseVNode("div", _hoisted_18, [createBaseVNode("div", _hoisted_19, toDisplayString(_ctx.__(item.display || item.handle)), 1), item.instructions ? (openBlock(), createBlock(_component_ui_description, {
						key: 0,
						class: "w-56 truncate text-2xs"
					}, {
						default: withCtx(() => [createTextVNode(toDisplayString(_ctx.__(item.instructions)), 1)]),
						_: 2
					}, 1024)) : createCommentVNode("", true)])]),
					_: 2
				}, [item.image ? {
					name: "default",
					fn: withCtx(() => [createBaseVNode("div", _hoisted_20, [item.instructions ? (openBlock(), createElementBlock("p", _hoisted_21, toDisplayString(_ctx.__(item.instructions)), 1)) : createCommentVNode("", true), createBaseVNode("img", {
						src: item.image,
						class: "rounded-lg"
					}, null, 8, _hoisted_22)])]),
					key: "0"
				} : void 0]), 1032, ["open"])], 10, _hoisted_17)) : createCommentVNode("", true)], 42, _hoisted_13);
			}), 128)), $options.noSearchResults ? (openBlock(), createElementBlock("div", _hoisted_23, toDisplayString(_ctx.__("No results")), 1)) : createCommentVNode("", true)])
		]),
		_: 3
	}, 8, ["align", "open"]));
}
var SetPicker_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$1, [["render", _sfc_render$1], ["__file", "SetPicker.vue"]]);
//#endregion
//#region resources/js/components/fieldtypes/replicator/ManagesSetMeta.js
var ManagesSetMeta_default = {
	mixins: [ManagesRowMeta_default],
	methods: {
		updateSetMeta(set, value) {
			this.updateRowMeta(set, value);
		},
		removeSetMeta(set) {
			this.removeRowMeta(set);
		}
	}
};
//#endregion
//#region resources/js/components/fieldtypes/bard/ToolbarButton.vue
var _sfc_main = {
	components: { Button: Button_default },
	props: {
		button: Object,
		active: Boolean,
		variant: String,
		config: Object,
		bard: {},
		editor: {}
	}
};
var _hoisted_1 = ["innerHTML"];
function _sfc_render(_ctx, _cache, $props, $setup, $data, $options) {
	const _component_ui_icon = resolveComponent("ui-icon");
	const _component_Button = resolveComponent("Button");
	const _directive_tooltip = resolveDirective("tooltip");
	return withDirectives((openBlock(), createBlock(_component_Button, {
		class: normalizeClass(["px-2!", {
			active: $props.active,
			group: $props.variant === "floating"
		}]),
		variant: $props.variant === "floating" ? "subtle" : "ghost",
		size: "sm",
		"aria-label": $props.button.text,
		onMousedown: _cache[0] || (_cache[0] = withModifiers(() => {}, ["prevent"])),
		onClick: _cache[1] || (_cache[1] = ($event) => $props.button.command($props.editor, $props.button.args))
	}, {
		default: withCtx(() => [$props.button.svg ? (openBlock(), createBlock(_component_ui_icon, {
			key: 0,
			name: $props.button.svg,
			class: normalizeClass(["size-3.5!", { "group-hover:text-white text-yellow-300!": $props.active && $props.variant === "floating" }])
		}, null, 8, ["name", "class"])) : createCommentVNode("", true), $props.button.html ? (openBlock(), createElementBlock("div", {
			key: 1,
			class: "flex items-center",
			innerHTML: $props.button.html
		}, null, 8, _hoisted_1)) : createCommentVNode("", true)]),
		_: 1
	}, 8, [
		"class",
		"variant",
		"aria-label"
	])), [[_directive_tooltip, $props.button.text]]);
}
var ToolbarButton_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main, [["render", _sfc_render], ["__file", "ToolbarButton.vue"]]);
//#endregion
export { addButtonHtml as a, ManagesRowMeta_default as i, ManagesSetMeta_default as n, availableButtons as o, SetPicker_default as r, Asset_default as s, ToolbarButton_default as t };
