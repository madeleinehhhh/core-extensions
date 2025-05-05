import { PluginDocumentSettingPanel } from "@wordpress/edit-post";
import { CheckboxControl } from "@wordpress/components";
import { registerPlugin } from "@wordpress/plugins";
import { withSelect, withDispatch } from "@wordpress/data";
import { compose } from "@wordpress/compose";

const Panel = ({ showContact, noPageLink, setMeta }) => (
  <PluginDocumentSettingPanel
    name="ap-team-options"
    title="Team Member Options"
    className="ap-team-options"
  >
    <CheckboxControl
      label="Show Contact Info"
      checked={!!showContact}
      onChange={(value) => setMeta({ ap_team_show_contact: value })}
    />
    <CheckboxControl
      label="No Page Link"
      checked={!!noPageLink}
      onChange={(value) => setMeta({ ap_team_no_page_link: value })}
    />
  </PluginDocumentSettingPanel>
);

const MetaPanel = compose(
  withSelect((select) => {
    const meta = select("core/editor").getEditedPostAttribute("meta") || {};
    return {
      showContact: meta.ap_team_show_contact,
      noPageLink: meta.ap_team_no_page_link,
    };
  }),
  withDispatch((dispatch) => ({
    setMeta(newMeta) {
      dispatch("core/editor").editPost({ meta: newMeta });
    },
  }))
)(Panel);

registerPlugin("ap-team-meta-panel", {
  render: MetaPanel,
  icon: null,
});
