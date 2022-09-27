<?php
/**
 * WP-CLI depreceated commands for ElasticPress
 *
 * @since  4.4.0
 * @package elasticpress
 */

namespace ElasticPress;

use \WP_CLI_Command as WP_CLI_Command;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Deprecated CLI Commands for ElasticPress
 */
class DeprecatedCommand extends WP_CLI_Command {

	/**
	 * Holds CLI command position args.
	 *
	 * Useful to share arguments to methods called by hooks.
	 *
	 * @since 4.0.0
	 * @var array
	 */
	protected $args = [];

	/**
	 * Holds CLI command associative args
	 *
	 * Useful to share arguments to methods called by hooks.
	 *
	 * @since 4.0.0
	 * @var array
	 */
	protected $assoc_args = [];

	/**
	 * Create Command
	 *
	 * @since  4.4.0
	 */
	public function __construct() {
		/**
		 * Instance of Command class
		 */
		$this->command = new \Elasticpress\Command();
	}

	/**
	 * Return all index names as a JSON object.
	 *
	 * ## OPTIONS
	 *
	 * [--pretty]
	 * : Use this flag to render a pretty-printed version of the JSON response.
	 *
	 * @subcommand get-indexes
	 * @alias get-indices
	 * @since      3.2, `--pretty` introduced in 4.1.0
	 * @param array $args Positional CLI args.
	 * @param array $assoc_args Associative CLI args.
	 * @deprecated 4.4.0
	 * @see Command\get_indices()
	 */
	public function get_indexes( $args, $assoc_args ) {
		_deprecated_function( 'get-indexes', '4.4.0', 'get-indices' );
		return $this->command->get_indices( $args, $assoc_args );
	}

	/**
	 * Return all indexes from the cluster as a JSON object.
	 *
	 * ## OPTIONS
	 *
	 * [--pretty]
	 * : Use this flag to render a pretty-printed version of the JSON response.
	 *
	 * @subcommand get-cluster-indexes
	 * @alias get-cluster-indices
	 * @since      3.2, `--pretty` introduced in 4.1.0
	 * @param array $args Positional CLI args.
	 * @param array $assoc_args Associative CLI args.
	 * @deprecated 4.4.0
	 * @see Command\get_cluster_indices()
	 */
	public function get_cluster_indexes( $args, $assoc_args ) {
		_deprecated_function( 'get-cluster-indexes', '4.4.0', 'get-cluster-indices' );
		return $this->command->get_cluster_indices( $args, $assoc_args );
	}

	/**
	 * Index all posts for a site or network wide.
	 *
	 * ## OPTIONS
	 *
	 * [--network-wide]
	 * : Force indexing on all the blogs in the network. `--network-wide` takes an optional argument to limit the number of blogs to be indexed across where 0 is no limit. For example, `--network-wide=5` would limit indexing to only 5 blogs on the network
	 *
	 * [--setup]
	 * : Clear the index first and re-send the put mapping. Use `--yes` to skip the confirmation
	 *
	 * [--per-page=<per_page_number>]
	 * : Determine the amount of posts to be indexed per bulk index (or cycle)
	 *
	 * [--nobulk]
	 * : Disable bulk indexing
	 *
	 * [--static-bulk]
	 * : Do not use dynamic bulk requests, i.e., send only one request per batch of documents.
	 *
	 * [--show-errors]
	 * : Show all errors
	 *
	 * [--show-bulk-errors]
	 * : Display the error message returned from Elasticsearch when a post fails to index using the /_bulk endpoint
	 *
	 * [--show-nobulk-errors]
	 * : Display the error message returned from Elasticsearch when a post fails to index while not using the /_bulk endpoint
	 *
	 * [--offset=<offset_number>]
	 * : Skip the first n posts (don't forget to remove the `--setup` flag when resuming or the index will be emptied before starting again).
	 *
	 * [--indexables=<indexables>]
	 * : Specify the Indexable(s) which will be indexed
	 *
	 * [--post-type=<post_types>]
	 * : Specify which post types will be indexed (by default: all indexable post types are indexed). For example, `--post-type="my_custom_post_type"` would limit indexing to only posts from the post type "my_custom_post_type". Accepts multiple post types separated by comma
	 *
	 * [--include=<IDs>]
	 * : Choose which object IDs to include in the index
	 *
	 * [--post-ids=<IDs>]
	 * : Choose which post_ids to include when indexing the Posts Indexable (deprecated)
	 *
	 * [--upper-limit-object-id=<ID>]
	 * : Upper limit of a range of IDs to be indexed. If indexing IDs from 30 to 45, this should be 45
	 *
	 * [--lower-limit-object-id=<ID>]
	 * : Lower limit of a range of IDs to be indexed. If indexing IDs from 30 to 45, this should be 30
	 *
	 * [--ep-host=<host>]
	 * : Custom Elasticsearch host
	 *
	 * [--ep-prefix=<prefix>]
	 * : Custom ElasticPress prefix
	 *
	 * [--yes]
	 * : Skip confirmation needed by `--setup`
	 *
	 * @alias sync
	 * @param array $args Positional CLI args.
	 * @since 0.1.2
	 * @param array $assoc_args Associative CLI args.
	 * @deprecated 4.4.0
	 * @see Command\sync()
	 */
	public function index( $args, $assoc_args ) {
		_deprecated_function( 'index', '4.4.0', 'sync' );
		return $this->command->sync( $args, $assoc_args );
	}

	/**
	 * Clear a sync/index process.
	 *
	 * If an index was stopped prematurely and won't start again, this will clear this cached data such that a new index can start.
	 *
	 * @subcommand clear-index
	 * @alias clear-sync
	 * @since      3.4
	 * @deprecated 4.4.0
	 * @see Command\clear_sync()
	 */
	public function clear_index() {
		_deprecated_function( 'clear-index', '4.4.0', 'clear-sync' );
		return $this->command->clear_sync( $args, $assoc_args );
	}

	/**
	 * Returns the status of an ongoing index operation in JSON array.
	 *
	 * Returns the status of an ongoing index operation in JSON array with the following fields:
	 * indexing | boolean | True if index operation is ongoing or false
	 * method | string | 'cli', 'web' or 'none'
	 * items_indexed | integer | Total number of items indexed
	 * total_items | integer | Total number of items indexed or -1 if not yet determined
	 *
	 * ## OPTIONS
	 *
	 * [--pretty]
	 * : Use this flag to render a pretty-printed version of the JSON response.
	 *
	 * @subcommand get-indexing-status
	 * @alias get-ongoing-sync-status
	 * @since 3.5.1, `--pretty` introduced in 4.1.0
	 * @param array $args Positional CLI args.
	 * @param array $assoc_args Associative CLI args.
	 * @deprecated 4.4.0
	 * @see Command\get_ongoing_sync_status()
	 */
	public function get_indexing_status( $args, $assoc_args ) {
		_deprecated_function( 'get-indexing-status', '4.4.0', 'get-ongoing-sync-status' );
		return $this->command->get_ongoing_sync_status( $args, $assoc_args );
	}

	/**
	 * Returns a JSON array with the results of the last CLI index (if present) or an empty array.
	 *
	 * ## OPTIONS
	 *
	 * [--clear]
	 * : Clear the `ep_last_cli_index` option.
	 *
	 * [--pretty]
	 * : Use this flag to render a pretty-printed version of the JSON response.
	 *
	 * @subcommand get-last-cli-index
	 * @alias get-last-cli-sync
	 * @since 3.5.1, `--pretty` introduced in 4.1.0
	 * @param array $args Positional CLI args.
	 * @param array $assoc_args Associative CLI args.
	 * @deprecated 4.4.0
	 * @see Command\get_last_cli_sync()
	 */
	public function get_last_cli_index( $args, $assoc_args ) {
		_deprecated_function( 'get-last-cli-index', '4.4.0', 'get-last-cli-sync' );
		return $this->command->get_last_cli_sync( $args, $assoc_args );
	}

	/**
	 * Stop the indexing operation started from the dashboard.
	 *
	 * @subcommand stop-indexing
	 * @alias stop-sync
	 * @since      3.5.2
	 * @param array $args Positional CLI args.
	 * @param array $assoc_args Associative CLI args.
	 * @deprecated 4.4.0
	 * @see Command\stop_sync()
	 */
	public function stop_indexing( $args, $assoc_args ) {
		_deprecated_function( 'stop-indexing', '4.4.0', 'stop-sync' );
		return $this->command->stop_sync( $args, $assoc_args );
	}

}
