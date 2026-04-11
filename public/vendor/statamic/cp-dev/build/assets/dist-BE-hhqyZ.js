import { E as getCurrentInstance, F as onBeforeUnmount, H as provide, L as onMounted, N as nextTick, O as h$1, T as defineComponent, Tt as unref, _t as ref, a as render, bt as toRaw, ct as customRef, ht as reactive, pt as markRaw, tt as watchEffect, yt as shallowRef } from "./vue.esm-bundler-Br3h1vy5.js";
import { $ as getHTMLFromFragment, $t as pasteRulesPlugin, A as decodeHtmlEntities, At as isMacOS, B as findDuplicates, Bt as isTextSelection, C as createBlockMarkdownSpec, Ct as isAtEndOfNode, D as createMappablePosition, Dt as isFirefox, E as createInlineMarkdownSpec, Et as isExtensionRulesEnabled, F as encodeHtmlEntities, Ft as isNumber, G as generateHTML, Gt as mergeAttributes, H as findParentNodeClosestToPos, Ht as markInputRule, I as escapeForRegEx, It as isPlainObject, J as getAttributes, Jt as nodeInputRule, K as generateJSON, Kt as mergeDeep, L as extensions_exports, Lt as isRegExp, M as deleteProps, Mt as isNodeActive, Nt as isNodeEmpty, O as createNodeFromContent, Ot as isFunction, P as elementFromString, Pt as isNodeSelection, Q as getExtensionField, Qt as parseIndentedBlocks, R as findChildren, Rt as isSafari, S as createAtomBlockMarkdownSpec, St as isAndroid, T as createDocument, Tt as isEmptyObject, U as flattenExtensions, Ut as markPasteRule, V as findParentNode, Vt as isiOS, W as fromString, Wt as markdown_exports, X as getChangedRanges, Xt as objectIncludes, Y as getAttributesFromExtensions, Yt as nodePasteRule, Z as getDebugJSON, Zt as parseAttributes, _ as callOrReturn, _t as getUpdatedPosition, a as Fragment6, an as rewriteUnknownContent, at as getNodeAttributes, b as combineTransactionSteps, bt as inputRulesPlugin, c as Mark, cn as serializeAttributes, ct as getSchema, d as NodePos, dn as textInputRule, dt as getSchemaTypeNameByName, en as posToDOMRect, et as getMarkAttributes, f as NodeView, fn as textPasteRule, ft as getSplittedAttributes, g as Tracker, gt as getTextSerializersFromSchema, h as ResizableNodeview, hn as wrappingInputRule, ht as getTextContentFromNodes, i as Extension, in as resolveFocusPosition, it as getNodeAtPosition, j as defaultBlockAt, jt as isMarkActive, k as createStyleTag, kt as isList, l as MarkView, ln as sortExtensions, lt as getSchemaByResolvedExtensions, m as ResizableNodeView, mn as updateMarkViewAttributes, mt as getTextBetween, n as Editor$1, nn as renderNestedMarkdownContent, nt as getMarkType, o as InputRule, on as schedulePositionCheck, ot as getNodeType, p as PasteRule, pn as textblockTypeInputRule, pt as getText, q as generateText, qt as minMax, r as Extendable, rn as resolveExtensions, rt as getMarksBetween, s as MappablePosition, sn as selectionToInsertionEnd, st as getRenderedAttributes, t as CommandManager, tn as removeDuplicates, tt as getMarkRange, u as Node3, un as splitExtensions, ut as getSchemaTypeByName, v as canInsertNode, vt as h, w as createChainableState, wt as isAtStartOfNode, x as commands_exports, xt as isActive, y as cancelPositionCheck, yt as injectExtensionAttributesToParseRule, z as findChildrenInRange, zt as isString } from "./dist-C84WUirB.js";
//#region node_modules/@tiptap/vue-3/dist/index.js
function useDebouncedRef(value) {
	return customRef((track, trigger) => {
		return {
			get() {
				track();
				return value;
			},
			set(newValue) {
				value = newValue;
				requestAnimationFrame(() => {
					requestAnimationFrame(() => {
						trigger();
					});
				});
			}
		};
	});
}
var Editor = class extends Editor$1 {
	constructor(options = {}) {
		super(options);
		this.contentComponent = null;
		this.appContext = null;
		this.reactiveState = useDebouncedRef(this.view.state);
		this.reactiveExtensionStorage = useDebouncedRef(this.extensionStorage);
		this.on("beforeTransaction", ({ nextState }) => {
			this.reactiveState.value = nextState;
			this.reactiveExtensionStorage.value = this.extensionStorage;
		});
		return markRaw(this);
	}
	get state() {
		return this.reactiveState ? this.reactiveState.value : this.view.state;
	}
	get storage() {
		return this.reactiveExtensionStorage ? this.reactiveExtensionStorage.value : super.storage;
	}
	/**
	* Register a ProseMirror plugin.
	*/
	registerPlugin(plugin, handlePlugins) {
		const nextState = super.registerPlugin(plugin, handlePlugins);
		if (this.reactiveState) this.reactiveState.value = nextState;
		return nextState;
	}
	/**
	* Unregister a ProseMirror plugin.
	*/
	unregisterPlugin(nameOrPluginKey) {
		const nextState = super.unregisterPlugin(nameOrPluginKey);
		if (this.reactiveState && nextState) this.reactiveState.value = nextState;
		return nextState;
	}
};
var EditorContent = defineComponent({
	name: "EditorContent",
	props: { editor: {
		default: null,
		type: Object
	} },
	setup(props) {
		const rootEl = ref();
		const instance = getCurrentInstance();
		watchEffect(() => {
			const editor = props.editor;
			if (editor && editor.options.element && rootEl.value) nextTick(() => {
				var _a;
				if (!rootEl.value || !((_a = editor.view.dom) == null ? void 0 : _a.parentNode)) return;
				const element = unref(rootEl.value);
				rootEl.value.append(...editor.view.dom.parentNode.childNodes);
				editor.contentComponent = instance.ctx._;
				if (instance) editor.appContext = {
					...instance.appContext,
					provides: instance.provides
				};
				editor.setOptions({ element });
				editor.createNodeViews();
			});
		});
		onBeforeUnmount(() => {
			const editor = props.editor;
			if (!editor) return;
			editor.contentComponent = null;
			editor.appContext = null;
		});
		return { rootEl };
	},
	render() {
		return h$1("div", { ref: (el) => {
			this.rootEl = el;
		} });
	}
});
var NodeViewContent = defineComponent({
	name: "NodeViewContent",
	props: { as: {
		type: String,
		default: "div"
	} },
	render() {
		return h$1(this.as, {
			style: { whiteSpace: "pre-wrap" },
			"data-node-view-content": ""
		});
	}
});
var NodeViewWrapper = defineComponent({
	name: "NodeViewWrapper",
	props: { as: {
		type: String,
		default: "div"
	} },
	inject: ["onDragStart", "decorationClasses"],
	render() {
		var _a, _b;
		return h$1(this.as, {
			class: this.decorationClasses,
			style: { whiteSpace: "normal" },
			"data-node-view-wrapper": "",
			onDragstart: this.onDragStart
		}, (_b = (_a = this.$slots).default) == null ? void 0 : _b.call(_a));
	}
});
var useEditor = (options = {}) => {
	const editor = shallowRef();
	onMounted(() => {
		editor.value = new Editor(options);
	});
	onBeforeUnmount(() => {
		var _a, _b, _c, _d;
		const nodes = (_b = (_a = editor.value) == null ? void 0 : _a.view.dom) == null ? void 0 : _b.parentNode;
		const newEl = nodes == null ? void 0 : nodes.cloneNode(true);
		(_c = nodes == null ? void 0 : nodes.parentNode) == null || _c.replaceChild(newEl, nodes);
		(_d = editor.value) == null || _d.destroy();
	});
	return editor;
};
var VueRenderer = class {
	constructor(component, { props = {}, editor }) {
		/**
		* Flag to track if the renderer has been destroyed, preventing queued or asynchronous renders from executing after teardown.
		*/
		this.destroyed = false;
		this.editor = editor;
		this.component = markRaw(component);
		this.el = document.createElement("div");
		this.props = reactive(props);
		this.renderedComponent = this.renderComponent();
	}
	get element() {
		return this.renderedComponent.el;
	}
	get ref() {
		var _a, _b, _c, _d;
		if ((_b = (_a = this.renderedComponent.vNode) == null ? void 0 : _a.component) == null ? void 0 : _b.exposed) return this.renderedComponent.vNode.component.exposed;
		return (_d = (_c = this.renderedComponent.vNode) == null ? void 0 : _c.component) == null ? void 0 : _d.proxy;
	}
	renderComponent() {
		if (this.destroyed) return this.renderedComponent;
		let vNode = h$1(this.component, this.props);
		if (this.editor.appContext) vNode.appContext = this.editor.appContext;
		if (typeof document !== "undefined" && this.el) render(vNode, this.el);
		const destroy = () => {
			if (this.el) render(null, this.el);
			this.el = null;
			vNode = null;
		};
		return {
			vNode,
			destroy,
			el: this.el ? this.el.firstElementChild : null
		};
	}
	updateProps(props = {}) {
		if (this.destroyed) return;
		Object.entries(props).forEach(([key, value]) => {
			this.props[key] = value;
		});
		this.renderComponent();
	}
	destroy() {
		if (this.destroyed) return;
		this.destroyed = true;
		this.renderedComponent.destroy();
	}
};
var markViewProps = {
	editor: {
		type: Object,
		required: true
	},
	mark: {
		type: Object,
		required: true
	},
	extension: {
		type: Object,
		required: true
	},
	inline: {
		type: Boolean,
		required: true
	},
	view: {
		type: Object,
		required: true
	},
	updateAttributes: {
		type: Function,
		required: true
	},
	HTMLAttributes: {
		type: Object,
		required: true
	}
};
var MarkViewContent = defineComponent({
	name: "MarkViewContent",
	props: { as: {
		type: String,
		default: "span"
	} },
	render() {
		return h$1(this.as, {
			style: { whiteSpace: "inherit" },
			"data-mark-view-content": ""
		});
	}
});
var VueMarkView = class extends MarkView {
	constructor(component, props, options) {
		super(component, props, options);
		const componentProps = {
			...props,
			updateAttributes: this.updateAttributes.bind(this)
		};
		this.renderer = new VueRenderer(defineComponent({
			extends: { ...component },
			props: Object.keys(componentProps),
			template: this.component.template,
			setup: (reactiveProps) => {
				var _a;
				return (_a = component.setup) == null ? void 0 : _a.call(component, reactiveProps, { expose: () => void 0 });
			},
			__scopeId: component.__scopeId,
			__cssModules: component.__cssModules,
			__name: component.__name,
			__file: component.__file
		}), {
			editor: this.editor,
			props: componentProps
		});
	}
	get dom() {
		return this.renderer.element;
	}
	get contentDOM() {
		return this.dom.querySelector("[data-mark-view-content]");
	}
	updateAttributes(attrs) {
		const unproxiedMark = toRaw(this.mark);
		super.updateAttributes(attrs, unproxiedMark);
	}
	destroy() {
		this.renderer.destroy();
	}
};
function VueMarkViewRenderer(component, options = {}) {
	return (props) => {
		if (!props.editor.contentComponent) return {};
		return new VueMarkView(component, props, options);
	};
}
var nodeViewProps = {
	editor: {
		type: Object,
		required: true
	},
	node: {
		type: Object,
		required: true
	},
	decorations: {
		type: Object,
		required: true
	},
	selected: {
		type: Boolean,
		required: true
	},
	extension: {
		type: Object,
		required: true
	},
	getPos: {
		type: Function,
		required: true
	},
	updateAttributes: {
		type: Function,
		required: true
	},
	deleteNode: {
		type: Function,
		required: true
	},
	view: {
		type: Object,
		required: true
	},
	innerDecorations: {
		type: Object,
		required: true
	},
	HTMLAttributes: {
		type: Object,
		required: true
	}
};
var VueNodeView = class extends NodeView {
	constructor() {
		super(...arguments);
		/**
		* Callback registered with the per-editor position-update registry.
		* Stored so it can be unregistered in destroy().
		*/
		this.positionCheckCallback = null;
		this.cachedExtensionWithSyncedStorage = null;
	}
	/**
	* Returns a proxy of the extension that redirects storage access to the editor's mutable storage.
	* This preserves the original prototype chain (instanceof checks, methods like configure/extend work).
	* Cached to avoid proxy creation on every update.
	*/
	get extensionWithSyncedStorage() {
		if (!this.cachedExtensionWithSyncedStorage) {
			const editor = this.editor;
			const extension = this.extension;
			this.cachedExtensionWithSyncedStorage = new Proxy(extension, { get(target, prop, receiver) {
				var _a;
				if (prop === "storage") return (_a = editor.storage[extension.name]) != null ? _a : {};
				return Reflect.get(target, prop, receiver);
			} });
		}
		return this.cachedExtensionWithSyncedStorage;
	}
	mount() {
		const props = {
			editor: this.editor,
			node: this.node,
			decorations: this.decorations,
			innerDecorations: this.innerDecorations,
			view: this.view,
			selected: false,
			extension: this.extensionWithSyncedStorage,
			HTMLAttributes: this.HTMLAttributes,
			getPos: () => this.getPos(),
			updateAttributes: (attributes = {}) => this.updateAttributes(attributes),
			deleteNode: () => this.deleteNode()
		};
		const onDragStart = this.onDragStart.bind(this);
		this.decorationClasses = ref(this.getDecorationClasses());
		const extendedComponent = defineComponent({
			extends: { ...this.component },
			props: Object.keys(props),
			template: this.component.template,
			setup: (reactiveProps) => {
				var _a, _b;
				provide("onDragStart", onDragStart);
				provide("decorationClasses", this.decorationClasses);
				return (_b = (_a = this.component).setup) == null ? void 0 : _b.call(_a, reactiveProps, { expose: () => void 0 });
			},
			__scopeId: this.component.__scopeId,
			__cssModules: this.component.__cssModules,
			__name: this.component.__name,
			__file: this.component.__file
		});
		this.handleSelectionUpdate = this.handleSelectionUpdate.bind(this);
		this.editor.on("selectionUpdate", this.handleSelectionUpdate);
		this.currentPos = this.getPos();
		this.positionCheckCallback = () => {
			if (!this.renderer) return;
			const newPos = this.getPos();
			if (typeof newPos !== "number" || newPos === this.currentPos) return;
			this.currentPos = newPos;
			this.renderer.updateProps({ getPos: () => this.getPos() });
		};
		schedulePositionCheck(this.editor, this.positionCheckCallback);
		this.renderer = new VueRenderer(extendedComponent, {
			editor: this.editor,
			props
		});
	}
	/**
	* Return the DOM element.
	* This is the element that will be used to display the node view.
	*/
	get dom() {
		if (!this.renderer.element || !this.renderer.element.hasAttribute("data-node-view-wrapper")) throw Error("Please use the NodeViewWrapper component for your node view.");
		return this.renderer.element;
	}
	/**
	* Return the content DOM element.
	* This is the element that will be used to display the rich-text content of the node.
	*/
	get contentDOM() {
		if (this.node.isLeaf) return null;
		return this.dom.querySelector("[data-node-view-content]");
	}
	/**
	* On editor selection update, check if the node is selected.
	* If it is, call `selectNode`, otherwise call `deselectNode`.
	*/
	handleSelectionUpdate() {
		const { from, to } = this.editor.state.selection;
		const pos = this.getPos();
		if (typeof pos !== "number") return;
		if (from <= pos && to >= pos + this.node.nodeSize) {
			if (this.renderer.props.selected) return;
			this.selectNode();
		} else {
			if (!this.renderer.props.selected) return;
			this.deselectNode();
		}
	}
	/**
	* On update, update the React component.
	* To prevent unnecessary updates, the `update` option can be used.
	*/
	update(node, decorations, innerDecorations) {
		const rerenderComponent = (props) => {
			this.decorationClasses.value = this.getDecorationClasses();
			this.renderer.updateProps(props);
		};
		if (typeof this.options.update === "function") {
			const oldNode = this.node;
			const oldDecorations = this.decorations;
			const oldInnerDecorations = this.innerDecorations;
			this.node = node;
			this.decorations = decorations;
			this.innerDecorations = innerDecorations;
			this.currentPos = this.getPos();
			return this.options.update({
				oldNode,
				oldDecorations,
				newNode: node,
				newDecorations: decorations,
				oldInnerDecorations,
				innerDecorations,
				updateProps: () => rerenderComponent({
					node,
					decorations,
					innerDecorations,
					extension: this.extensionWithSyncedStorage
				})
			});
		}
		if (node.type !== this.node.type) return false;
		const newPos = this.getPos();
		if (node === this.node && this.decorations === decorations && this.innerDecorations === innerDecorations) {
			if (newPos === this.currentPos) return true;
			this.currentPos = newPos;
			rerenderComponent({
				node,
				decorations,
				innerDecorations,
				extension: this.extensionWithSyncedStorage,
				getPos: () => this.getPos()
			});
			return true;
		}
		this.node = node;
		this.decorations = decorations;
		this.innerDecorations = innerDecorations;
		this.currentPos = newPos;
		rerenderComponent({
			node,
			decorations,
			innerDecorations,
			extension: this.extensionWithSyncedStorage
		});
		return true;
	}
	/**
	* Select the node.
	* Add the `selected` prop and the `ProseMirror-selectednode` class.
	*/
	selectNode() {
		this.renderer.updateProps({ selected: true });
		if (this.renderer.element) this.renderer.element.classList.add("ProseMirror-selectednode");
	}
	/**
	* Deselect the node.
	* Remove the `selected` prop and the `ProseMirror-selectednode` class.
	*/
	deselectNode() {
		this.renderer.updateProps({ selected: false });
		if (this.renderer.element) this.renderer.element.classList.remove("ProseMirror-selectednode");
	}
	getDecorationClasses() {
		return this.decorations.flatMap((item) => item.type.attrs.class).join(" ");
	}
	destroy() {
		this.renderer.destroy();
		this.editor.off("selectionUpdate", this.handleSelectionUpdate);
		if (this.positionCheckCallback) {
			cancelPositionCheck(this.editor, this.positionCheckCallback);
			this.positionCheckCallback = null;
		}
	}
};
function VueNodeViewRenderer(component, options) {
	return (props) => {
		if (!props.editor.contentComponent) return {};
		return new VueNodeView(typeof component === "function" && "__vccOpts" in component ? component.__vccOpts : component, props, options);
	};
}
//#endregion
export { CommandManager, Editor, EditorContent, Extendable, Extension, Fragment6 as Fragment, InputRule, MappablePosition, Mark, MarkView, MarkViewContent, Node3 as Node, NodePos, NodeView, NodeViewContent, NodeViewWrapper, PasteRule, ResizableNodeView, ResizableNodeview, Tracker, VueMarkView, VueMarkViewRenderer, VueNodeViewRenderer, VueRenderer, callOrReturn, canInsertNode, cancelPositionCheck, combineTransactionSteps, commands_exports as commands, createAtomBlockMarkdownSpec, createBlockMarkdownSpec, createChainableState, createDocument, h as createElement, h, createInlineMarkdownSpec, createMappablePosition, createNodeFromContent, createStyleTag, decodeHtmlEntities, defaultBlockAt, deleteProps, elementFromString, encodeHtmlEntities, escapeForRegEx, extensions_exports as extensions, findChildren, findChildrenInRange, findDuplicates, findParentNode, findParentNodeClosestToPos, flattenExtensions, fromString, generateHTML, generateJSON, generateText, getAttributes, getAttributesFromExtensions, getChangedRanges, getDebugJSON, getExtensionField, getHTMLFromFragment, getMarkAttributes, getMarkRange, getMarkType, getMarksBetween, getNodeAtPosition, getNodeAttributes, getNodeType, getRenderedAttributes, getSchema, getSchemaByResolvedExtensions, getSchemaTypeByName, getSchemaTypeNameByName, getSplittedAttributes, getText, getTextBetween, getTextContentFromNodes, getTextSerializersFromSchema, getUpdatedPosition, injectExtensionAttributesToParseRule, inputRulesPlugin, isActive, isAndroid, isAtEndOfNode, isAtStartOfNode, isEmptyObject, isExtensionRulesEnabled, isFirefox, isFunction, isList, isMacOS, isMarkActive, isNodeActive, isNodeEmpty, isNodeSelection, isNumber, isPlainObject, isRegExp, isSafari, isString, isTextSelection, isiOS, markInputRule, markPasteRule, markViewProps, markdown_exports as markdown, mergeAttributes, mergeDeep, minMax, nodeInputRule, nodePasteRule, nodeViewProps, objectIncludes, parseAttributes, parseIndentedBlocks, pasteRulesPlugin, posToDOMRect, removeDuplicates, renderNestedMarkdownContent, resolveExtensions, resolveFocusPosition, rewriteUnknownContent, schedulePositionCheck, selectionToInsertionEnd, serializeAttributes, sortExtensions, splitExtensions, textInputRule, textPasteRule, textblockTypeInputRule, updateMarkViewAttributes, useEditor, wrappingInputRule };
