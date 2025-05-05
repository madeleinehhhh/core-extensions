const { PluginDocumentSettingPanel } = wp.editPost;
const { CheckboxControl } = wp.components;
const { useSelect, useDispatch } = wp.data;
const { registerPlugin } = wp.plugins;
const { createElement: el, Fragment } = wp.element;

const MetaPanel = () => {
  const meta = useSelect((select) =>
    select("core/editor").getEditedPostAttribute("meta")
  );
  const { editPost } = useDispatch("core/editor");

  if (!meta) return null;

  return el(
    PluginDocumentSettingPanel,
    {
      name: "ap-team-options",
      title: "Team Member Options",
    },
    el(CheckboxControl, {
      label: "Show Contact Info",
      checked: !!meta.ap_team_show_contact,
      onChange: (value) => {
        editPost({
          meta: { ...meta, ap_team_show_contact: value },
        });
      },
    }),
    el(CheckboxControl, {
      label: "No Page Link",
      checked: !!meta.ap_team_no_page_link,
      onChange: (value) => {
        editPost({
          meta: { ...meta, ap_team_no_page_link: value },
        });
      },
    })
  );
};

registerPlugin("ap-team-meta-panel", {
  render: MetaPanel,
});
