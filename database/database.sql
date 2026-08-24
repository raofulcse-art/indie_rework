users (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255),
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL
)


teams (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE,
    logo VARCHAR(255) NULL,
    description TEXT NULL,
    created_by BIGINT UNSIGNED, -- FK -> users.id
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL
)


team_staff (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    team_id BIGINT UNSIGNED, -- FK -> teams.id
    user_id BIGINT UNSIGNED, -- FK -> users.id
    role ENUM('owner', 'manager'),
    added_by BIGINT UNSIGNED NULL, -- FK -> users.id
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    UNIQUE(team_id, user_id)
)


players (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NULL UNIQUE, -- FK -> users.id
    full_name VARCHAR(255),
    date_of_birth DATE NULL,
    phone VARCHAR(30) NULL,
    photo VARCHAR(255) NULL,
    preferred_foot ENUM('left', 'right', 'both') NULL,
    primary_position VARCHAR(50) NULL,
    created_by BIGINT UNSIGNED NULL, -- FK -> users.id
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL
)


team_players (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    team_id BIGINT UNSIGNED, -- FK -> teams.id
    player_id BIGINT UNSIGNED, -- FK -> players.id
    squad_number SMALLINT UNSIGNED NULL,
    member_role ENUM('player', 'captain', 'vice_captain'),
    membership_status ENUM('active', 'released', 'transferred'),
    joined_at DATE,
    left_at DATE NULL,
    added_by BIGINT UNSIGNED NULL, -- FK -> users.id
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
)


player_account_link_requests (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    player_id BIGINT UNSIGNED, -- FK -> players.id
    user_id BIGINT UNSIGNED, -- FK -> users.id
    initiated_by BIGINT UNSIGNED, -- FK -> users.id
    status ENUM('pending', 'accepted', 'rejected', 'cancelled', 'expired'),
    expires_at TIMESTAMP,
    responded_at TIMESTAMP NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
)


team_invitations (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    team_id BIGINT UNSIGNED, -- FK -> teams.id
    invited_user_id BIGINT UNSIGNED, -- FK -> users.id
    invited_by BIGINT UNSIGNED, -- FK -> users.id
    status ENUM('pending', 'accepted', 'rejected', 'cancelled', 'expired'),
    expires_at TIMESTAMP,
    responded_at TIMESTAMP NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
)


tournaments (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description TEXT NULL,
    start_date DATE NULL,
    end_date DATE NULL,
    created_by BIGINT UNSIGNED, -- FK -> users.id
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL
)


tournament_teams (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    tournament_id BIGINT UNSIGNED, -- FK -> tournaments.id
    team_id BIGINT UNSIGNED, -- FK -> teams.id
    added_by BIGINT UNSIGNED, -- FK -> users.id
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    UNIQUE(tournament_id, team_id)
)


football_matches (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    tournament_id BIGINT UNSIGNED NULL, -- FK -> tournaments.id
    home_team_id BIGINT UNSIGNED, -- FK -> teams.id
    away_team_id BIGINT UNSIGNED, -- FK -> teams.id
    scheduled_at DATETIME NULL,
    round_name VARCHAR(100) NULL,
    venue VARCHAR(255) NULL,
    match_status ENUM(
        'scheduled',
        'awaiting_results',
        'partially_submitted',
        'published',
        'disputed',
        'postponed',
        'cancelled'
    ),
    published_home_score SMALLINT UNSIGNED NULL,
    published_away_score SMALLINT UNSIGNED NULL,
    winner_team_id BIGINT UNSIGNED NULL, -- FK -> teams.id
    published_at TIMESTAMP NULL,
    created_by BIGINT UNSIGNED, -- FK -> users.id
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
)


match_result_submissions (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    football_match_id BIGINT UNSIGNED, -- FK -> football_matches.id
    submitted_by_team_id BIGINT UNSIGNED, -- FK -> teams.id
    submitted_by_user_id BIGINT UNSIGNED, -- FK -> users.id
    home_score SMALLINT UNSIGNED,
    away_score SMALLINT UNSIGNED,
    submitted_at TIMESTAMP,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    UNIQUE(football_match_id, submitted_by_team_id)
)


match_result_actions (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    football_match_id BIGINT UNSIGNED, -- FK -> football_matches.id
    performed_by BIGINT UNSIGNED, -- FK -> users.id
    action ENUM(
        'dispute_resolved',
        'admin_published',
        'result_corrected',
        'result_cancelled'
    ),
    previous_home_score SMALLINT UNSIGNED NULL,
    previous_away_score SMALLINT UNSIGNED NULL,
    new_home_score SMALLINT UNSIGNED NULL,
    new_away_score SMALLINT UNSIGNED NULL,
    reason TEXT,
    created_at TIMESTAMP
)


roles (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    guard_name VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    UNIQUE(name, guard_name)
)


permissions (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    guard_name VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    UNIQUE(name, guard_name)
)


model_has_roles (
    role_id BIGINT UNSIGNED, -- FK -> roles.id
    model_type VARCHAR(255),
    model_id BIGINT UNSIGNED,

    PRIMARY KEY(role_id, model_id, model_type)
)


model_has_permissions (
    permission_id BIGINT UNSIGNED, -- FK -> permissions.id
    model_type VARCHAR(255),
    model_id BIGINT UNSIGNED,

    PRIMARY KEY(permission_id, model_id, model_type)
)


role_has_permissions (
    permission_id BIGINT UNSIGNED, -- FK -> permissions.id
    role_id BIGINT UNSIGNED, -- FK -> roles.id

    PRIMARY KEY(permission_id, role_id)
)
